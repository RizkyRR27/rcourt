<?php

namespace App\Http\Controllers;
use App\Models\Tournament;
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

         $oneTimeEvent = Tournament::where('is_recurring', false)
            ->whereDate('start_date', '<=', $userDate)
            ->whereDate('end_date', '>=', $userDate)
            ->first();

        if ($oneTimeEvent) {
            // Kalau kena tanggal ini, langsung tolak!
            return redirect()->route('booking')->with('error', 
                '⛔ MAAF! Tanggal ' . $userDate->format('d M Y') . ' ditutup untuk event: ' . $oneTimeEvent->name
            );
        }

        $recurringEvents = Tournament::where('is_recurring', true)->get();


        foreach ($recurringEvents as $event) {
            // Kita "paksa" tahun turnamen jadi tahun pilihan user
            // Tambahkan startOfDay() agar jamnya mulai 00:00:00
            $start = Carbon::parse($event->start_date)
                        ->setYear($userDate->year)
                        ->startOfDay(); 
            
            // Tambahkan endOfDay() agar jamnya berakhir 23:59:59
            $end   = Carbon::parse($event->end_date)
                        ->setYear($userDate->year)
                        ->endOfDay();

            // Cek apakah tanggal user ada di antara rentang itu
            if ($userDate->between($start, $end)) {
                return redirect()->route('booking')->with('error', 
                    '⛔ MAAF! Tanggal ini kena jadwal rutin tahunan: ' . $event->name
                );
            }
        }

    $cekTglUser = $request->input('date');
    $cekTurnamenSekali = \App\Models\Tournament::where('is_recurring', 0)->get();
    
    // dd([
    //     'STATUS' => 'DEBUGGING MODE',
    //     'TANGGAL_YANG_DICARI_USER' => $cekTglUser,
    //     'TOTAL_TURNAMEN_SEKALI_PAKAI' => $cekTurnamenSekali->count(),
    //     'LIST_DATA_DATABASE' => $cekTurnamenSekali->toArray()
    // ]);


        // try {
        //     $isTournament = Tournament::where('start_date', '<=', $date)
        //         ->where('end_date', '>=', $date)
        //         // ->where('category', $type) // Uncomment baris ini jika turnamen cuma blokir tipe tertentu (misal turnamen badminton doang)
        //         ->first();

        //     if ($isTournament) {
        //         // KICK USER BALIK KE HALAMAN DEPAN
        //         return redirect()->route('booking')->with('error', 
        //             'Mohon Maaf! Tanggal ' . \Carbon\Carbon::parse($date)->translatedFormat('d F Y') . 
        //             ' ditutup untuk kegiatan: ' . $isTournament->name . ' 🏆'
        //         );
        //     }
        // } catch (\Exception $e) {
        //     // Jaga-jaga kalau tabel tournaments belum dibuat, biar gak error 500
        //     // (Lewati saja pengecekan kalau tabelnya gak ada)
        // }

        // 2. Ambil Data Lapangan
        $courts = Court::where('type', $type)->get();
        $results = [];

        // 3. Setting Jam
        $openTime = 8;
        $closeTime = 24;

        foreach ($courts as $court) {
            // --- PERBAIKAN HARGA DI SINI ---
            // Kita ambil harga dari database.
            // Cek kolom 'price', kalau null cek 'price_per_hour'.
            // Kalau masih null/0, kita kasih harga default (misal 50rb) biar gak Rp 0.
            $standardPrice = $court->price ?? $court->price_per_hour ?? 0;

            // DEBUGGING: Kalau database ternyata kosong, kita kasih harga minimal 
            // (Hapus baris ini kalau database sudah fix, tapi ini membantu biar gak Rp 0)
            if ($standardPrice == 0) {
                 // Cek tipe lapangan untuk harga darurat
                 if($type == 'badminton') $standardPrice = 30000;
                 elseif($type == 'futsal') $standardPrice = 100000;
                 else $standardPrice = 50000;
            }
            // -------------------------------

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

                // B. HITUNG HARGA TOTAL
                if (!$isBooked) {
                    $totalPrice = 0;
                    
                    for ($h = 0; $h < $duration; $h++) {
                        $currentHour = $i + $h;
                        
                        // Mulai dari harga dasar yg sudah kita ambil di atas
                        $hourPrice = $standardPrice;

                        // Logic Tambahan Malam (Misal: Jam 17 ke atas nambah 10rb)
                        if ($currentHour >= 17) {
                            $hourPrice += 10000; 
                        }

                        $totalPrice += $hourPrice;
                    }

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
       // Simpan sementara ke session sebagai fallback jika form hidden hilang
       session(['booking' => [
           'court_id' => $courtId,
           'date' => $date,
           'start_time' => $startTime,
           'end_time' => $endTime,
           'total_price' => $price,
       ]]);

       return view('booking.checkout', [
            'court' => $availableCourt, 
            'date' => $date,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'price' => $price
        ]);
    }

    // --- MENYIMPAN DATA BOOKING ---
    public function store(Request $request)
    {
        // 1. VALIDASI DATA INPUT
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'court_id' => 'required',
        ]);

        // =================================================================
        // SATPAM 1: CEK TURNAMEN (LAGI)
        // Wajib cek lagi disini untuk mencegah pembobolan lewat URL / Backdoor
        // =================================================================
        $isTournament = Tournament::where('start_date', '<=', $request->date)
            ->where('end_date', '>=', $request->date)
            ->first();

        if ($isTournament) {
            // Kalau ketahuan tanggal turnamen, tolak mentah-mentah!
            return redirect()->route('booking')->with('error', 
                'GAGAL BOOKING! Tanggal ' . $request->date . ' dipakai untuk event: ' . $isTournament->name
            );
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
            return redirect()->route('booking')->with('error', 
                'Waduh! Slot jam ini baru saja diserobot orang lain. Silakan cari jam lain.'
            );
        }

        // =================================================================
        // JIKA AMAN, BARU PROSES SIMPAN
        // =================================================================

        // Upload Bukti (Jika ada)
        $proofPath = null;
        if ($request->hasFile('payment_proof')) {
            $proofPath = $request->file('payment_proof')->store('proofs', 'public');
        }

        // Normalisasi Payment Method (Biar DB gak error enum)
        $dbPaymentMethod = ($request->payment_method == 'cod') ? 'cod' : 'transfer';

        // Create Data
        $booking = Booking::create([
            'user_id' => 2, // Hardcode User ID (sementara)
            'court_id' => $request->court_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'total_price' => $request->total_price,
            'payment_method' => $dbPaymentMethod,
            'payment_type' => ($dbPaymentMethod == 'transfer') ? 'full' : null,
            'payment_proof' => $proofPath,
            'status' => 'pending',
        ]);

        return redirect()->route('booking.success', $booking->id);
    }
}