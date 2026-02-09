<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Admin
        User::create([
            'name' => 'Admin RCourt',
            'email' => 'admin@rcourt.com',
            'role' => 'admin',
            'password' => Hash::make('password'), // Password: password
        ]);

        // 2. Buat 3 User Dummy
        $users = [
            ['name' => 'Budi Santoso', 'email' => 'budi@gmail.com'],
            ['name' => 'Siti Aminah', 'email' => 'siti@gmail.com'],
            ['name' => 'Rizky User', 'email' => 'rizky@gmail.com'],
        ];

        foreach ($users as $u) {
            User::create([
                'name' => $u['name'],
                'email' => $u['email'],
                'role' => 'user',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
