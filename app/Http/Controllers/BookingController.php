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
            'basket_outdoor' => 'Basket Outdoor',
            'mini_soccer' => 'Mini Soccer',
        ];

        return view('booking.index', compact('types'));
    }

    public function search(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'type' => 'required',
            'date' => 'required|date|after_or_equal:today',
        ]);

        $type = $request->type;
        $date = Carbon::parse($request->date);
        
        // 2. Tentukan Apakah Weekend atau Weekday?
        $isWeekend = $date->isWeekend(); // True jika Sabtu/Minggu

        // 3. Konfigurasi Harga (Sesuai Request User)
        // Format: [Harga Siang, Harga Malam, Batas Jam Ganti Harga]
        $pricingRules = [
            'badminton' => [
                'weekday' => ['day' => 30000, 'night' => 40000],
                'weekend' => ['day' => 35000, 'night' => 45000],
                'split_hour' => 17, // Jam 17:00 ganti harga
            ],
            'futsal' => [
                'weekday' => ['day' => 85000, 'night' => 105000],
                'weekend' => ['day' => 90000, 'night' => 115000],
                'split_hour' => 16, // Khusus Futsal jam 16:00 ganti harga (sesuai request)
            ],
            'basket_indoor' => [
                'weekday' => ['day' => 200000, 'night' => 275000],
                'weekend' => ['day' => 225000, 'night' => 300000],
                'split_hour' => 17,
            ],
            'basket_outdoor' => [
                'weekday' => ['day' => 90000, 'night' => 105000],
                'weekend' => ['day' => 100000, 'night' => 110000],
                'split_hour' => 17,
            ],
            'mini_soccer' => [
                'weekday' => ['day' => 650000, 'night' => 800000],
                'weekend' => ['day' => 725000, 'night' => 900000],
                'split_hour' => 17,
            ],
        ];

        // 4. Ambil Total Lapangan yang dimiliki (Misal: Badminton ada 3)
        $totalCourts = Court::where('type', $type)->count();
        $courtIds = Court::where('type', $type)->pluck('id');

        // 5. Generate Slot Waktu (08:00 - 24:00)
        $slots = [];
        for ($hour = 8; $hour < 24; $hour++) {
            $start = sprintf('%02d:00:00', $hour); // Contoh: 08:00:00
            $end = sprintf('%02d:00:00', $hour + 1); // Contoh: 09:00:00

            // -- Cek Berapa Orang yang Sudah Booking di Jam & Tipe Lapangan ini --
            $bookedCount = Booking::whereIn('court_id', $courtIds)
                ->where('date', $date->format('Y-m-d'))
                ->where('start_time', $start)
                ->where('status', '!=', 'rejected') // Jangan hitung yang ditolak admin
                ->count();

            // -- Hitung Sisa Lapangan --
            $available = $totalCourts - $bookedCount;

            // -- Hitung Harga Sesuai Aturan --
            $rule = $pricingRules[$type];
            $priceConfig = $isWeekend ? $rule['weekend'] : $rule['weekday'];
            
            // Jika jam sekarang < jam batas (split_hour), pakai harga siang.
            $price = ($hour < $rule['split_hour']) ? $priceConfig['day'] : $priceConfig['night'];

            $slots[] = [
                'start_time' => sprintf('%02d:00', $hour),
                'end_time' => sprintf('%02d:00', $hour + 1),
                'price' => $price,
                'available_courts' => $available,
                'is_full' => $available <= 0,
            ];
        }

        return view('booking.result', compact('slots', 'type', 'date'));
    }
}