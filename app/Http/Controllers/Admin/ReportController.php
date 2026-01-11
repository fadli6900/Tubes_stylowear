<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // Mengambil Top 10 Produk Terlaris berdasarkan jumlah qty di order_items
        // Kita join ke tabel products untuk mengambil nama produk
        $productStats = OrderItem::join('products', 'order_items.product_id', '=', 'products.id')
            ->select('products.name', DB::raw('SUM(order_items.qty) as total_qty'))
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_qty')
            ->take(10)
            ->get();

        $labels = $productStats->pluck('name');
        $data = $productStats->pluck('total_qty');

        // 2. Produk dengan Stok Menipis (misal < 10)
        $lowStockProducts = Product::where('stock', '<', 10)
            ->orderBy('stock', 'asc')
            ->take(10)
            ->get();

        // 3. Statistik Kategori (Revenue per category)
        $categoryStats = OrderItem::join('products', 'order_items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('categories.name', DB::raw('SUM(order_items.qty) as total_sold'), DB::raw('SUM(order_items.price * order_items.qty) as total_revenue'))
            ->groupBy('categories.id', 'categories.name')
            ->get();

        return view('admin.reports.index', compact('labels', 'data', 'lowStockProducts', 'categoryStats'));
    }
}
