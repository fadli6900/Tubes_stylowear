<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if (!$product->is_active) {
            return redirect()->back()->with('error', 'Maaf, produk ini sedang tidak aktif.');
        }

        $cart = session()->get('cart', []);
        $quantity = (int) $request->input('quantity', 1);
        if ($quantity < 1) $quantity = 1;
        $size = $request->input('size'); // Ambil input ukuran

        // Buat key unik kombinasi ID dan Ukuran (jika ada ukuran)
        $cartKey = $size ? $id . '_' . $size : $id;

        $currentQty = isset($cart[$cartKey]) ? $cart[$cartKey]['quantity'] : 0;
        if (($currentQty + $quantity) > $product->stock) {
            return redirect()->back()->with('error', 'Maaf, jumlah pesanan melebihi stok yang tersedia (' . $product->stock . ').');
        }

        if(isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            $cart[$cartKey] = [
                "product_id" => $product->id, // Simpan ID asli produk
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->image ?? null,
                "size" => $size // Simpan ukuran
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');

            $productId = $cart[$request->id]['product_id'] ?? $request->id;
            $product = Product::find($productId);
            if ($product && $request->quantity > $product->stock) {
                return redirect()->back()->with('error', 'Maaf, jumlah pesanan melebihi stok yang tersedia (' . $product->stock . ').');
            }

            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Keranjang berhasil diperbarui!');
        }
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Produk dihapus dari keranjang');
    }
}