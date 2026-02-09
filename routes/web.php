<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


use App\Http\Controllers\BookingController;

// Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Placeholder untuk halaman booking (nanti kita buat)
Route::get('/booking', function () {
    return "Halaman Booking (Segera Hadir)";
})->name('booking');

// Placeholder untuk kontak (nanti kita buat)
Route::get('/contact', function () {
    return "Halaman Kontak Kami (Segera Hadir)";
})->name('contact');

// Halaman Form Booking (Pilih Tanggal & Jenis)
Route::get('/booking', [BookingController::class, 'index'])->name('booking');

// Route untuk memproses pencarian jadwal (Nanti kita pakai ini)
Route::post('/booking/search', [BookingController::class, 'search'])->name('booking.search');