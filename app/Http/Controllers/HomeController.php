<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Court;

class HomeController extends Controller
{
    /**
     * Metadata konfigurasi untuk setiap tipe lapangan.
     * Data ini digunakan untuk menampilkan informasi di halaman home.
     */
    private const FACILITY_META = [
        'badminton' => [
            'label' => 'BADMINTON',
            'icon' => '🏸',
            'description' => 'Lapangan karpet standar internasional dengan pencahayaan optimal.',
            'category' => 'Indoor',
            'price' => 'IDR 80K/hr',
        ],
        'futsal' => [
            'label' => 'FUTSAL',
            'icon' => '⚽',
            'description' => 'Rumput sintetis berkualitas tinggi nyaman untuk bermain.',
            'category' => 'Indoor',
            'price' => 'IDR 150K/hr',
        ],
        'basket_indoor' => [
            'label' => 'BASKET INDOOR',
            'icon' => '🏀',
            'description' => 'Lantai parket kayu, full AC, dan papan skor digital.',
            'category' => 'Indoor',
            'price' => 'IDR 200K/hr',
        ],
        'tennis' => [
            'label' => 'TENNIS',
            'icon' => '🎾',
            'description' => 'Lapangan outdoor dengan suasana segar dan lantai standar.',
            'category' => 'Outdoor',
            'price' => 'IDR 120K/hr',
        ],
        'mini_soccer' => [
            'label' => 'MINI SOCCER',
            'icon' => '🥅',
            'description' => 'Lapangan luas cocok untuk pertandingan 7 vs 7.',
            'category' => 'Outdoor',
            'price' => 'IDR 300K/hr',
        ],
        'padel' => [
            'label' => 'PADEL',
            'icon' => '🤾',
            'description' => 'Lapangan dengan standar yang sesuai dengan regulasi dunia.',
            'category' => 'Indoor',
            'price' => 'IDR 100K/hr',
        ],
    ];

    public function index()
    {
        // Ambil semua tipe lapangan yang ada di database dan hitung jumlahnya
        $courtTypes = Court::selectRaw('type, COUNT(*) as total')
            ->groupBy('type')
            ->pluck('total', 'type');

        // Bangun array fasilitas secara dinamis
        $facilities = [];
        foreach ($courtTypes as $type => $count) {
            $meta = self::FACILITY_META[$type] ?? [
                'label' => strtoupper(str_replace('_', ' ', $type)),
                'icon' => '🏟',
                'description' => 'Fasilitas olahraga berkualitas.',
                'category' => 'Indoor',
                'price' => 'IDR -/hr',
            ];

            $facilities[] = array_merge($meta, [
                'type' => $type,
                'count' => $count,
            ]);
        }

        return view('home', compact('facilities'));
    }
}
