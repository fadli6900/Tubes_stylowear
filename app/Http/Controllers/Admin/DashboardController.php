<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $revenue = Order::sum('total');

        // Placeholder values for growth stats (bisa diganti logic real nanti)
        $orderGrowth = 0;
        $userGrowth = 0;
        $revenueGrowth = 0;

        $latestOrders = Order::with('user')->latest()->take(5)->get();
        $bestSellingProducts = Product::latest()->take(5)->get();
        $latestUsers = User::latest()->take(5)->get();
        
        // Ambil pesanan pending untuk dikonfirmasi
        $pendingOrders = Order::where('status', 'pending')->with('user')->latest()->get();

        // --- Grafik Penjualan Harian (7 Hari Terakhir) ---
        $dailyStats = Order::selectRaw('DATE(created_at) as date, SUM(total) as total')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $dailyLabels = $dailyStats->pluck('date')->map(fn($d) => \Carbon\Carbon::parse($d)->format('d M'));
        $dailyData = $dailyStats->pluck('total');

        // --- Grafik Penjualan Bulanan (12 Bulan Terakhir) ---
        $monthlyStats = Order::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(total) as total')
            ->where('created_at', '>=', now()->subMonths(12))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $monthlyLabels = $monthlyStats->pluck('month')->map(fn($m) => \Carbon\Carbon::parse($m . '-01')->format('M Y'));
        $monthlyData = $monthlyStats->pluck('total');

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalProducts',
            'totalUsers',
            'revenue',
            'orderGrowth',
            'userGrowth',
            'revenueGrowth',
            'latestOrders',
            'bestSellingProducts',
            'latestUsers',
            'dailyLabels',
            'dailyData',
            'monthlyLabels',
            'monthlyData',
            'pendingOrders'
        ));
    }
}