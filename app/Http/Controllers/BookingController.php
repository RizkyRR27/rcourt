<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Court;
use App\Models\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{

    public function index()
    {
        $types = [
            'badminton' => 'Badminton',
            'futsal' => 'Futsal',
            'basket_indoor' => 'Basket Indoor',
            'Tennis' => 'Tennis',
            'mini_soccer' => 'Mini Soccer',
            'padel' => 'Padel',
        ];

        return view('booking.index', compact('types'));
    }
   public function search(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'date' => 'required|date|after_or_equal:today',
            'duration' => 'required|integer|min:1|max:5', // Validasi durasi
        ]);

        $type = $request->type;
        $date = Carbon::parse($request->date);
        $duration = (int) $request->duration;
        $isWeekend = $date->isWeekend();

        // 1. Ambil Semua Lapangan Fisik sesuai Tipe
        $courts = Court::where('type', $type)->get();

        // Konfigurasi Harga (Sama seperti sebelumnya)
        $pricingRules = [
            'badminton' => ['weekday' => ['day' => 30000, 'night' => 40000], 'weekend' => ['day' => 35000, 'night' => 45000], 'split_hour' => 17],
            'futsal' => ['weekday' => ['day' => 85000, 'night' => 105000], 'weekend' => ['day' => 90000, 'night' => 115000], 'split_hour' => 16],
            'basket_indoor' => ['weekday' => ['day' => 200000, 'night' => 275000], 'weekend' => ['day' => 225000, 'night' => 300000], 'split_hour' => 17],
            'Tennis' => ['weekday' => ['day' => 50000, 'night' => 70000], 'weekend' => ['day' => 70000, 'night' => 100000], 'split_hour' => 17],
            'mini_soccer' => ['weekday' => ['day' => 650000, 'night' => 800000], 'weekend' => ['day' => 725000, 'night' => 900000], 'split_hour' => 17],
            'padel' => ['weekday' => ['day' => 450000, 'night' => 600000], 'weekend' => ['day' => 500000, 'night' => 750000], 'split_hour' => 17],
        ];

        // Struktur Data Hasil:
        // $results = [ 'Badminton 1' => [Slot A, Slot B], 'Badminton 2' => [Slot A] ]
        $results = [];

        foreach ($courts as $court) {
            $courtSlots = [];

            // Loop jam operasional (08:00 sampai 24:00 dikurangi durasi main)
            // Kalau main 2 jam, booking terakhir jam 22:00 (selesai 24:00)
            for ($hour = 8; $hour <= (24 - $duration); $hour++) {
                
                $isSlotAvailable = true;
                $totalPrice = 0;

                // Cek Ketersediaan & Hitung Harga untuk SETIAP JAM dalam durasi
                for ($h = 0; $h < $duration; $h++) {
                    $checkHour = $hour + $h;
                    $start = sprintf('%02d:00:00', $checkHour);

                    // Cek apakah jam ini sudah dibooking orang lain?
                    $exists = Booking::where('court_id', $court->id)
                        ->where('date', $date->format('Y-m-d'))
                        ->where('start_time', $start)
                        ->where('status', '!=', 'rejected')
                        ->exists();

                    if ($exists) {
                        $isSlotAvailable = false;
                        break; // Jika 1 jam saja penuh, maka durasi ini tidak valid
                    }

                    // Hitung Harga per jam
                    $rule = $pricingRules[$type];
                    $priceConfig = $isWeekend ? $rule['weekend'] : $rule['weekday'];
                    $hourlyPrice = ($checkHour < $rule['split_hour']) ? $priceConfig['day'] : $priceConfig['night'];
                    
                    $totalPrice += $hourlyPrice;
                }

                if ($isSlotAvailable) {
                    $courtSlots[] = [
                        'start_time' => sprintf('%02d:00', $hour),
                        'end_time'   => sprintf('%02d:00', $hour + $duration),
                        'price'      => $totalPrice,
                    ];
                }
            }

            // Simpan slot milik lapangan ini
            $results[] = [
                'court_name' => $court->name,
                'court_id'   => $court->id,
                'slots'      => $courtSlots
            ];
        }

        return view('booking.result', compact('results', 'type', 'date', 'duration'));
    }
    public function create(Request $request)
    {
        // 1. Ambil Data dari URL
        $courtId = $request->court_id;
        $date = $request->date;
        $startTime = $request->start_time;
        $endTime = $request->end_time;
        $price = $request->price;

        // 2. VALIDASI KEAMANAN (DOUBLE CHECK)
        // Kita harus pastikan lapangan ID ini BENAR-BENAR KOSONG di jam tsb.
        // Logic: Cari booking di lapangan ini yang waktunya bertabrakan.
        
        $isBooked = Booking::where('court_id', $courtId)
            ->where('date', $date)
            ->where('status', '!=', 'rejected')
            ->where(function ($query) use ($startTime, $endTime) {
                // Cek irisan waktu (Overlap)
                $query->where(function($q) use ($startTime, $endTime) {
                    $q->where('start_time', '>=', $startTime)
                      ->where('start_time', '<', $endTime);
                })
                ->orWhere(function($q) use ($startTime, $endTime) {
                    $q->where('end_time', '>', $startTime)
                      ->where('end_time', '<=', $endTime);
                });
            })
            ->exists(); // True jika sudah ada yang booking

        // Jika ternyata sudah dibooking orang lain
        if ($isBooked) {
            return redirect()->route('booking')->with('error', 'Maaf, lapangan ini baru saja diambil orang lain beberapa detik yang lalu!');
        }

        // 3. Ambil Data Lapangan
        $availableCourt = Court::find($courtId);

        // 4. Tampilkan Halaman Checkout
        return view('booking.checkout', [
            'availableCourt' => $availableCourt,
            'date' => $date,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'price' => $price
        ]);
    }

    // --- MENYIMPAN DATA BOOKING ---
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'court_id' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'total_price' => 'required',
            'payment_method' => 'required',
            'payment_proof' => 'nullable|image|max:2048', // Maksimal 2MB
        ]);

        // 2. Upload Bukti Bayar (Jika ada)
        $proofPath = null;
        if ($request->hasFile('payment_proof')) {
            // Simpan ke folder: storage/app/public/proofs
            $proofPath = $request->file('payment_proof')->store('proofs', 'public');
        }

        // 3. Simpan ke Database
        $booking = Booking::create([
            'user_id' => 2, // HARDCODE DULU (Pura-pura jadi User ID 2 karena belum Login)
            'court_id' => $request->court_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'total_price' => $request->total_price,
            'payment_method' => $request->payment_method,
            'payment_type' => $request->payment_method == 'transfer' ? 'full' : null, // Asumsi lunas kalau transfer
            'payment_proof' => $proofPath,
            'status' => 'pending',
        ]);

        // 4. Redirect ke Halaman Sukses
        return redirect()->route('booking.success', $booking->id);
    }
}