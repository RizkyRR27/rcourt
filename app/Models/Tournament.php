<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    // Izinkan semua kolom diisi
    protected $guarded = ['id'];

    // Pastikan kolom tanggal dibaca sebagai format Date, bukan String biasa
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}