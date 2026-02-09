<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HistoryController;
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

// Menampilkan Halaman Checkout/Pembayaran
Route::get('/booking/checkout', [BookingController::class, 'create'])->name('booking.create');

// Menyimpan Data Booking ke Database
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

// Halaman Sukses (Setelah booking)
Route::get('/booking/success/{id}', function ($id) {
    return view('booking.success', compact('id'));
})->name('booking.success');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

// Proses Update Status (Approve/Reject)
Route::post('/admin/booking/{id}/update', [AdminController::class, 'updateStatus'])->name('admin.booking.update');

// Halaman Riwayat Booking User
Route::get('/riwayat', [HistoryController::class, 'index'])->name('history');

// Halaman Tiket (Detail)
Route::get('/riwayat/{id}/tiket', [HistoryController::class, 'show'])->name('history.ticket');