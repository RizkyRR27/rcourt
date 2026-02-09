<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourtSeeder extends Seeder
{
    public function run(): void
    {
        $courts = [
            ['type' => 'badminton', 'count' => 3],
            ['type' => 'futsal', 'count' => 2],
            ['type' => 'basket_indoor', 'count' => 2],
            ['type' => 'basket_outdoor', 'count' => 1],
            ['type' => 'mini_soccer', 'count' => 1],
            ['type' => 'padel', 'count' => 3],
        ];

        foreach ($courts as $c) {
            for ($i = 1; $i <= $c['count']; $i++) {
                DB::table('courts')->insert([
                    // Nama jadi: Badminton 1, Badminton 2, dst
                    'name' => ucfirst(str_replace('_', ' ', $c['type'])) . ' ' . $i, 
                    'type' => $c['type'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
