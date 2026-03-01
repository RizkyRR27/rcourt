<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RewardController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Kontak
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Halaman Fasilitas
Route::get('/facilities', [HomeController::class, 'facilities'])->name('facilities');

// Halaman Turnamen
Route::get('/turnamen', [TournamentController::class, 'index'])->name('tournament');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'processLogin']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'processRegister']);
});

// Logout (Harus Login)
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');
    

Route::middleware('auth')->group(function () {
    // --- Booking ---
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::get('/booking/search', [BookingController::class, 'search'])->name('booking.search');
    Route::get('/booking/checkout', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/success/{id}', function ($id) {
        $booking = \App\Models\Booking::findOrFail($id);
        return view('booking.success', compact('booking'));
    })->name('booking.success');

    // --- Riwayat Booking ---
    Route::get('/riwayat', [HistoryController::class, 'index'])->name('history');
    Route::get('/riwayat/{id}/tiket', [HistoryController::class, 'show'])->name('history.ticket');

    // --- Profil User ---
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    // --- Reward (Loyalty Program) ---
    Route::get('/reward', [RewardController::class, 'index'])->name('reward.index');
    Route::get('/reward/history', [RewardController::class, 'history'])->name('reward.history');
    Route::post('/reward/{id}/choose', [RewardController::class, 'choose'])->name('reward.choose');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.home');
    Route::get('/admin/bookings', [AdminController::class, 'index'])->name('admin.bookings');
    Route::post('/admin/booking/{id}/update', [AdminController::class, 'updateStatus'])->name('admin.booking.update');
    Route::post('/admin/booking/{id}/extend', [AdminController::class, 'extendBooking'])->name('admin.booking.extend');
});
