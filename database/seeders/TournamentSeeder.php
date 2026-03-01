<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tournament;

class TournamentSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Grand Opening (SEKALI SAJA - TAHUN 2026)
        Tournament::create([
            'name' => 'Grand Opening Tournament 🎉',
            'start_date' => '2026-05-05', 
            'end_date'   => '2026-05-12', 
            'description' => 'Lomba pembukaan arena baru.',
            'is_recurring' => false, 
        ]);

        // 2. Lomba Tahunan (RUTIN)
        Tournament::create([
            'name' => 'Lomba Tahunan 🏆',
            'start_date' => '2024-01-12',
            'end_date'   => '2024-01-17',
            'description' => 'Turnamen rutin tahunan.',
            'is_recurring' => true, 
        ]);
    }
}