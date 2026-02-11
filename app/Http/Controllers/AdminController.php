<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Import Model Booking

class AdminController extends Controller
{
    // 1. TAMPILKAN SEMUA BOOKING
    public function index()
    {
        // Ambil semua data booking, urutkan dari yang terbaru
        // Kita juga load relasi 'user' dan 'court' biar namanya muncul
        $bookings = Booking::with(['user', 'court'])->latest()->get();

        return view('admin.index', compact('bookings'));
    }

    // 2. PROSES APPROVE / REJECT
    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        // Validasi input (hanya boleh 'approved' atau 'rejected')
        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        // Update status di database
        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('success', 'Status booking berhasil diperbarui!');
    }
}