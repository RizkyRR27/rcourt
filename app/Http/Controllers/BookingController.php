<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Helpers\PricingHelper;
use Illuminate\Http\Request;
use App\Models\Court;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{

    public function index()
    {
        $types = [
            'badminton' => 'Badminton',
            'futsal' => 'Futsal',
            'basket_indoor' => 'Basket Indoor',
            'tennis' => 'Tennis',
            'mini_soccer' => 'Mini Soccer',
            'padel' => 'Padel',
        ];

        return view('booking.index', compact('types'));
    }
    public function search(Request $request)
    {
        // 1. Ambil Input
        $type = $request->input('type');
        $date = $request->input('date');
        $duration = $request->input('duration');


        if (!$type || !$date || !$duration) {
            return redirect()->back()->withErrors(['msg' => 'Data tidak lengkap']);
        }
        $userDate = Carbon::parse($date);

       

        $tournamentEvent = Tournament::findBlockingEvent($date);
        if ($tournamentEvent) {
            return redirect()->route('booking')->with(
                'error',
                '⛔ MAAF! Tanggal ' . $userDate->format('d M Y') . ' ditutup untuk event: ' . $tournamentEvent->name
            );
        }



        // 2. Ambil Data Lapangan
        $courts = Court::where('type', $type)->get();
        $results = [];

        // 3. Setting Jam
        $openTime = 8;
        $closeTime = 24;

        // Jika tanggal booking = HARI INI, mulai dari jam sekarang (bukan jam 8)
        if (Carbon::parse($date)->isToday()) {
            $currentHour = Carbon::now()->hour;
            $openTime = max($openTime, $currentHour);
        }

        foreach ($courts as $court) {
            $slots = [];

            // Loop Waktu
            for ($i = $openTime; $i <= ($closeTime - $duration); $i++) {

                $slotStart = sprintf('%02d:00:00', $i);
                $slotEnd   = sprintf('%02d:00:00', $i + $duration);

                // A. CEK BENTROK
                $isBooked = Booking::where('court_id', $court->id)
                    ->where('date', $date)
                    ->where('status', '!=', 'rejected')
                    ->where(function ($query) use ($slotStart, $slotEnd) {
                        $query->where('start_time', '<', $slotEnd)
                            ->where('end_time', '>', $slotStart);
                    })
                    ->exists();

                // B. HITUNG HARGA TOTAL (via PricingHelper — single source of truth)
                if (!$isBooked) {
                    $totalPrice = PricingHelper::calculateTotal($type, $date, $slotStart, $slotEnd);

                    $slots[] = [
                        'start_time' => $slotStart,
                        'end_time'   => $slotEnd,
                        'price'      => $totalPrice,
                        'is_full'    => false
                    ];
                }
            }

            $results[] = [
                'court_id'   => $court->id,
                'court_name' => $court->name,
                'slots'      => $slots
            ];
        }

        return view('booking.result', [
            'results'  => $results,
            'date'     => $date,
            'type'     => $type,
            'duration' => $duration
        ]);
    }
    public function create(Request $request)
    {
        // 1. Ambil Data dari URL
        $courtId = $request->input('court_id') ?? $request->query('court_id');

        // Terima nilai dari query string atau input POST (fallback ke keduanya)
        $date = $request->input('date') ?? $request->query('date');
        $startTime = $request->input('start_time') ?? $request->query('start_time');
        $endTime = $request->input('end_time') ?? $request->query('end_time');
        $price = $request->input('price') ?? $request->query('price');

        // 2. VALIDASI KEAMANAN (DOUBLE CHECK)
        // Kita harus pastikan lapangan ID ini BENAR-BENAR KOSONG di jam tsb.
        // Logic: Cari booking di lapangan ini yang waktunya bertabrakan.

        $isBooked = Booking::where('court_id', $courtId)
            ->where('date', $date)
            ->where('status', '!=', 'rejected')
            ->where(function ($query) use ($startTime, $endTime) {
                // Cek irisan waktu (Overlap)
                $query->where(function ($q) use ($startTime, $endTime) {
                    $q->where('start_time', '>=', $startTime)
                        ->where('start_time', '<', $endTime);
                })
                    ->orWhere(function ($q) use ($startTime, $endTime) {
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

        // 2. VALIDASI JIKA TANGGAL TERKENA TURNAMEN
        $tournamentEvent = Tournament::findBlockingEvent($date);
        if ($tournamentEvent) {
            return redirect()->route('booking')->with(
                'error',
                '⛔ MAAF! Tanggal ' . Carbon::parse($date)->format('d M Y') . ' ditutup untuk event: ' . $tournamentEvent->name
            );
        }

       

        // 4. Tampilkan Halaman Checkout
        // Simpan sementara ke session sebagai fallback jika form hidden hilang
        session(['booking' => [
            'court_id' => $courtId,
            'date' => $date,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'total_price' => $price,
        ]]);

        // 5. Ambil Voucher Diskon yang dimiliki user (HANYA untuk jenis lapangan yang sama)
        $discountVouchers = collect();
        if (Auth::check()) {
            $courtType = $availableCourt->type; // Tipe olahraga lapangan ini
            $discountVouchers = \App\Models\UserReward::where('user_id', Auth::id())
                ->where('reward_type', 'discount')
                ->where('is_used', false)
                ->where('sport_type', $courtType) // Filter by sport type
                ->get();
        }

        return view('booking.checkout', [
            'court' => $availableCourt,
            'date' => $date,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'price' => $price,
            'discountVouchers' => $discountVouchers,
        ]);
    }

    // --- MENYIMPAN DATA BOOKING ---
    public function store(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login dulu untuk booking.');
        }
        $user = Auth::user();

        // 1. VALIDASI DATA INPUT
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'court_id' => 'required|exists:courts,id',
            'phone' => ['required', 'regex:/^(\+62|62|0)8[1-9][0-9]{6,9}$/'],
        ], [
            'phone.required' => 'Nomor WhatsApp wajib diisi untuk pengiriman notifikasi.',
            'phone.regex' => 'Format nomor tidak valid. Gunakan format Indonesia (contoh: 081234567890).',
        ]);

        

        // =================================================================
        // SATPAM 1: CEK TURNAMEN (LAGI)
        // Wajib cek lagi disini untuk mencegah pembobolan lewat URL / Backdoor
        // =================================================================
        $tournamentEvent = Tournament::findBlockingEvent($request->date);

        if ($tournamentEvent) {
            return redirect()->route('booking')->with(
                'error',
                'GAGAL BOOKING! Tanggal ' . Carbon::parse($request->date)->format('d M Y') . ' dipakai untuk event: ' . $tournamentEvent->name
            );
        }

        // =================================================================
        // HITUNG HARGA DI SERVER (Anti Price Tampering)
        // Tidak percaya harga dari client — selalu hitung ulang
        // =================================================================
        $bookedCourt = Court::findOrFail($request->court_id);
        $finalPrice = PricingHelper::calculateTotal(
            $bookedCourt->type,
            $request->date,
            $request->start_time,
            $request->end_time
        );

        $isDiscounted = false;
        $discountReward = null;

        // Cek apakah user memilih voucher diskon
        if ($request->filled('voucher_id')) {
            $discountReward = \App\Models\UserReward::where('id', $request->voucher_id)
                ->where('user_id', $user->id)
                ->where('reward_type', 'discount')
                ->where('is_used', false)
                ->where('sport_type', $bookedCourt->type)
                ->first();

            if ($discountReward) {
                $discountAmount = $finalPrice * 0.10;
                $finalPrice = $finalPrice - $discountAmount;
                $isDiscounted = true;
            }
        }
        // =================================================================
        // SATPAM 2: CEK BENTROK JAM (LAGI)
        // Pastikan slot ini belum diambil orang lain sedetik yang lalu
        // =================================================================
        $isBooked = Booking::where('court_id', $request->court_id)
            ->where('date', $request->date)
            ->where('status', '!=', 'rejected')
            ->where(function ($query) use ($request) {
                // Rumus Overlap Matematika
                $query->where('start_time', '<', $request->end_time)
                    ->where('end_time', '>', $request->start_time);
            })
            ->exists();

        if ($isBooked) {
            return redirect()->route('booking')->with(
                'error',
                'Waduh! Slot jam ini baru saja diserobot orang lain. Silakan cari jam lain.'
            );
        }

        // Upload Bukti (Jika ada)
        $proofPath = null;
        if ($request->hasFile('payment_proof')) {
            $proofPath = $request->file('payment_proof')->store('proofs', 'public');
        }

        // Normalisasi Payment Method (Biar DB gak error enum)
        $dbPaymentMethod = ($request->payment_method == 'cod') ? 'cod' : 'transfer';

        // Create Data
        $booking = Booking::create([
            'user_id' => $user->id, // <--- PAKAI USER ASLI
            'court_id' => $request->court_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'total_price' => $finalPrice, // <--- HARGA SETELAH DISKON (JIKA ADA)
            'discount' => $isDiscounted ? 10 : 0, // Persentase diskon
            'payment_method' => $dbPaymentMethod,
            'payment_type' => ($dbPaymentMethod == 'transfer') ? 'full' : null,
            'payment_proof' => $proofPath,
            'status' => 'pending',
            'phone' => $request->phone,
        ]);
        if ($isDiscounted && $discountReward) {
            $discountReward->update(['is_used' => true]);
            session()->flash('success', 'Booking Berhasil! Diskon Hadiah 10% telah digunakan.');
        } else {
            session()->flash('success', 'Booking Berhasil!');
        }

        return redirect()->route('booking.success', $booking->id);
    }
}
