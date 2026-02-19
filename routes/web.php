<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\ProfileController;

// Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Placeholder untuk halaman booking (nanti kita buat)
// Route::get('/booking', function () {
//     return "Halaman Booking (Segera Hadir)";
// })->name('booking');

// Halaman Kontak
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Halaman Booking (Wajib Login)
Route::middleware('auth')->group(function () {
    // Halaman Form Booking (Pilih Tanggal & Jenis)
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');

    // Route untuk memproses pencarian jadwal
    Route::get('/booking/search', [BookingController::class, 'search'])->name('booking.search');

    // Menampilkan Halaman Checkout/Pembayaran
    Route::get('/booking/checkout', [BookingController::class, 'create'])->name('booking.create');

    // Menyimpan Data Booking ke Database
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

    // Halaman Sukses (Setelah booking)
    Route::get('/booking/success/{id}', function ($id) {
        $booking = \App\Models\Booking::findOrFail($id);
        return view('booking.success', compact('booking'));
    })->name('booking.success');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    // Proses Update Status (Approve/Reject)
    Route::post('/admin/booking/{id}/update', [AdminController::class, 'updateStatus'])->name('admin.booking.update');
});

// Halaman Riwayat Booking User
Route::get('/riwayat', [HistoryController::class, 'index'])->name('history');

// Halaman Tiket (Detail)
Route::get('/riwayat/{id}/tiket', [HistoryController::class, 'show'])->name('history.ticket');

Route::get('/turnamen', [TournamentController::class, 'index'])->name('tournament');


Route::get('/facilities', [App\Http\Controllers\HomeController::class, 'facilities'])->name('facilities');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'processLogin']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'processRegister']);
});

// ROUTE LOGOUT (User Only)
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::get('/my-history', [HistoryController::class, 'index'])
    ->name('history')
    ->middleware('auth'); // Wajib Login

// Profil User
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});

// Halaman Reward (Member Only)
Route::middleware('auth')->group(function () {
    Route::get('/reward', [App\Http\Controllers\RewardController::class, 'index'])->name('reward.index');
    Route::get('/reward/history', [App\Http\Controllers\RewardController::class, 'history'])->name('reward.history');
    Route::post('/reward/{id}/choose', [App\Http\Controllers\RewardController::class, 'choose'])->name('reward.choose');
});
