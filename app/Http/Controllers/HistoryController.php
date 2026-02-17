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
                    ->get();

        return view('user.history', compact('bookings'));
    }
}