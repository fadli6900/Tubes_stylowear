<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalOrders' => Order::count(),
            'orderGrowth' => 12, // atau hitung real

            'totalProducts' => Product::count(),

            'totalUsers' => User::count(),
            'userGrowth' => 8,

            'revenue' => Order::where('status', 'completed')->sum('total_price'),
            'revenueGrowth' => 15,

            'latestOrders' => Order::withCount('items')
                ->latest()
                ->limit(5)
                ->get(),

            'bestSellingProducts' => Product::orderByDesc('sold')
                ->limit(5)
                ->get(),

            'users' => User::latest()->get(),
        ]);
    }
}
