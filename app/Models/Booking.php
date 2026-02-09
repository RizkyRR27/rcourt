<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    // Kita gunakan guared = [] agar semua kolom boleh diisi (lebih praktis)
    // Atau bisa pakai $fillable seperti di Model Court
    protected $guarded = ['id'];

    // --- RELASI ANTAR TABEL ---

    // 1. Booking milik satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 2. Booking milik satu Lapangan (Court)
    public function court()
    {
        return $this->belongsTo(Court::class);
    }
}