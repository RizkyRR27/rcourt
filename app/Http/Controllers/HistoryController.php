<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        // Ambil booking milik USER YANG SEDANG LOGIN saja
        // Urutkan dari yang terbaru (latest)
        // Kita gunakan Auth::id() atau ID 2 (hardcode) jika kamu belum login
        $userId = Auth::id() ?? 2; 

        $bookings = Booking::with('court')
            ->where('user_id', $userId)
            ->latest()
            ->get();

        return view('history.index', compact('bookings'));
    }
    
    // Fitur Cetak Tiket (Simpel)
    public function show($id)
    {
        $booking = Booking::with(['court', 'user'])->findOrFail($id);
        return view('history.ticket', compact('booking'));
    }
}