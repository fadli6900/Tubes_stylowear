<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
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

        return view('admin.reports.index', compact('labels', 'data'));
    }
}
