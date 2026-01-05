<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $revenue = Order::where('status', 'completed')->sum('total');

        // Placeholder for growth metrics - implement actual calculation if historical data is available
        $orderGrowth = 12;
        $userGrowth = 8;
        $revenueGrowth = 15;

        $latestOrders = Order::latest()->take(5)->get()->map(function($order) {
            $order->items_count = $order->items()->count();
            $order->total_price = $order->items()->sum(DB::raw('price * qty'));
            return $order;
        });

        $bestSellingProducts = Product::leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
            ->select('products.*', DB::raw('SUM(order_items.qty) as sold'))
            ->groupBy('products.id', 'products.name', 'products.category_id', 'products.price', 'products.stock', 'products.created_at', 'products.updated_at', 'products.description', 'products.image') // Include all non-aggregated columns
            ->orderBy('sold', 'desc')
            ->take(5)->get();

        return view('admin.dashboard', compact(
            'totalOrders', 'totalProducts', 'totalUsers', 'revenue',
            'orderGrowth', 'userGrowth', 'revenueGrowth',
            'latestOrders', 'bestSellingProducts'
        ));
    }
}
