<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    // Kita gunakan guared = [] agar semua kolom boleh diisi (lebih praktis)
    // Atau bisa pakai $fillable seperti di Model Court
    protected $guarded = ['id'];

    // --- AUTO GENERATE KODE BOOKING ---
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($booking) {
            // Format: RCRT-XXXXXX (6 karakter random uppercase)
            do {
                $code = 'RCRT-' . strtoupper(Str::random(6));
            } while (self::where('code', $code)->exists());

            $booking->code = $code;
        });
    }

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
