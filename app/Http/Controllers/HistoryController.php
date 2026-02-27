<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        // Hanya ambil booking milik user yang sedang login
        $bookings = Booking::where('user_id', Auth::id())
            ->with('court')
            ->latest()
            ->paginate(10);

        return view('user.history', compact('bookings'));
    }

    public function show($id)
    {
        // Ambil booking beserta relasi court
        $booking = Booking::with('court')->findOrFail($id);

        // Pastikan user hanya bisa lihat tiket miliknya sendiri
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke tiket ini.');
        }

        return view('user.ticket', compact('booking'));
    }
}
