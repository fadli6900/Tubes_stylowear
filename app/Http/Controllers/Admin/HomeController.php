<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua kategori untuk dropdown filter, urutkan berdasarkan nama
        $categories = Category::orderBy('name')->get();

        // Query dasar untuk produk, load relasi category untuk efisiensi
        $query = Product::with('category')->latest();

        // Logika Filter: Jika ada input 'category_id' dari search bar
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Logika Search: Jika ada input kata kunci 'search' (opsional)
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Ambil data produk dengan pagination
        $products = $query->paginate(12);

        // Kembalikan ke view 'home' (atau 'welcome') dengan data produk dan kategori
        return view('home', compact('products', 'categories'));
    }
}