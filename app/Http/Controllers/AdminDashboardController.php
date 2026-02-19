<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Court;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // 1. Stat Cards
        $totalBookings = Booking::count();
        $totalRevenue = Booking::where('status', 'approved')->sum('total_price');
        $totalUsers = User::where('role', '!=', 'admin')->count();
        $pendingBookings = Booking::where('status', 'pending')->count();

        // 2. Booking per bulan (6 bulan terakhir)
        $monthlyBookings = Booking::select(
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
            DB::raw('COUNT(*) as total'),
            DB::raw("SUM(CASE WHEN status = 'approved' THEN total_price ELSE 0 END) as revenue")
        )
            ->where('created_at', '>=', Carbon::now()->subMonths(5)->startOfMonth())
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Format labels & data untuk chart
        $chartLabels = [];
        $chartBookings = [];
        $chartRevenue = [];

        // Pastikan 6 bulan lengkap (termasuk bulan kosong)
        for ($i = 5; $i >= 0; $i--) {
            $monthKey = Carbon::now()->subMonths($i)->format('Y-m');
            $monthLabel = Carbon::now()->subMonths($i)->translatedFormat('M Y');
            $chartLabels[] = $monthLabel;

            $found = $monthlyBookings->firstWhere('month', $monthKey);
            $chartBookings[] = $found ? $found->total : 0;
            $chartRevenue[] = $found ? (int) $found->revenue : 0;
        }

        // 3. Distribusi per jenis lapangan
        $courtDistribution = Booking::join('courts', 'bookings.court_id', '=', 'courts.id')
            ->select('courts.type', DB::raw('COUNT(*) as total'))
            ->groupBy('courts.type')
            ->get();

        $pieLabels = $courtDistribution->pluck('type')->map(fn($t) => ucfirst(str_replace('_', ' ', $t)))->toArray();
        $pieData = $courtDistribution->pluck('total')->toArray();

        // 4. 5 Booking terbaru
        $recentBookings = Booking::with(['user', 'court'])->latest()->take(5)->get();

        // 5. Statistik hari ini
        $todayBookings = Booking::whereDate('date', Carbon::today())->count();
        $todayRevenue = Booking::where('status', 'approved')->whereDate('date', Carbon::today())->sum('total_price');

        return view('admin.dashboard', compact(
            'totalBookings',
            'totalRevenue',
            'totalUsers',
            'pendingBookings',
            'chartLabels',
            'chartBookings',
            'chartRevenue',
            'pieLabels',
            'pieData',
            'recentBookings',
            'todayBookings',
            'todayRevenue'
        ));
    }
}
