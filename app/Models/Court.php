<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;

    // Nama tabel di database (opsional jika nama tabel jamak/plural, tapi bagus untuk ketegasan)
    protected $table = 'courts';

    // Kolom yang boleh diisi secara massal (mass assignment)
    // Penting untuk Seeder agar data bisa masuk
    protected $fillable = [
        'name',
        'type',
    ];
}