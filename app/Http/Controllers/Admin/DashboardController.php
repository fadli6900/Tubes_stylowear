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

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalProducts',
            'totalUsers',
            'revenue',
            'orderGrowth',
            'userGrowth',
            'revenueGrowth',
            'latestOrders',
            'bestSellingProducts'
        ));
    }
}