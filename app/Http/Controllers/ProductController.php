<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with('category');
        $query->where('stock', '>', 0);

        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->paginate(12);
        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    /**
     * Add the product to the cart.
     */
    public function addToCart(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->stock <= 0) {
            return redirect()->back()->with('error', 'Maaf, stok produk ini sudah habis.');
        }

        $cart = session()->get('cart', []);
        $cartKey = $id; // Gunakan ID sebagai key (default tanpa size)

        // Cek quantity saat ini (handle format array atau integer lama)
        $currentQty = isset($cart[$cartKey]) ? (is_array($cart[$cartKey]) ? $cart[$cartKey]['quantity'] : $cart[$cartKey]) : 0;

        if (($currentQty + 1) > $product->stock) {
            return redirect()->back()->with('error', 'Maaf, jumlah pesanan melebihi stok yang tersedia (' . $product->stock . ').');
        }

        if (isset($cart[$cartKey]) && is_array($cart[$cartKey])) {
            $cart[$cartKey]['quantity']++;
        } else {
            // Simpan dengan format array yang konsisten dengan CartController
            $cart[$cartKey] = [
                "product_id" => $product->id,
                "name" => $product->name,
                "quantity" => $currentQty + 1,
                "price" => $product->price,
                "image" => $product->image ?? null,
                "size" => null
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }
}
