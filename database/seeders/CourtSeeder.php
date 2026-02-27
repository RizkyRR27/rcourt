<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourtSeeder extends Seeder
{
    /**
     * Daftar lapangan beserta harga per jam.
     */
    private const COURTS = [
        'badminton'     => ['count' => 3, 'price' => 30000,  'weekend_price' => 45000],
        'futsal'        => ['count' => 2, 'price' => 90000,  'weekend_price' => 110000],
        'basket_indoor' => ['count' => 2, 'price' => 200000, 'weekend_price' => 230000],
        'tennis'        => ['count' => 2, 'price' => 70000,  'weekend_price' => 90000],
        'mini_soccer'   => ['count' => 1, 'price' => 650000, 'weekend_price' => 700000],
        'padel'         => ['count' => 3, 'price' => 300000, 'weekend_price' => 320000],
    ];

    public function run(): void
    {
        foreach (self::COURTS as $type => $config) {
            for ($i = 1; $i <= $config['count']; $i++) {
                DB::table('courts')->insert([
                    'name'          => ucfirst(str_replace('_', ' ', $type)) . ' ' . $i,
                    'type'          => $type,
                    'price'         => $config['price'],
                    'weekend_price' => $config['weekend_price'],
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
            }
        }
    }
}
