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
            'basket_outdoor' => Court::where('type', 'basket_outdoor')->count(),
            'mini_soccer' => Court::where('type', 'mini_soccer')->count(),
        ];

        // Kirim data $counts ke view 'home'
        return view('home', compact('counts'));
    }
}