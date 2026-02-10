<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Court; // Jangan lupa import Model Court

class HomeController extends Controller
{
    public function index()
    {
        // Menghitung jumlah lapangan per kategori
        $counts = [
            'badminton' => Court::where('type', 'badminton')->count(),
            'futsal' => Court::where('type', 'futsal')->count(),
            'basket_indoor' => Court::where('type', 'basket_indoor')->count(),
            'Tennis' => Court::where('type', 'Tennis')->count(),
            'mini_soccer' => Court::where('type', 'mini_soccer')->count(),
            'padel' => Court::where('type', 'padel')->count(),
        ];

        // Kirim data $counts ke view 'home'
        return view('home', compact('counts'));
    }
}