<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // For logging payment errors
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if(empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong');
        }

        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('checkout.index', compact('cart', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string',
            'address' => 'required|string',
        ]);

        $cart = session()->get('cart', []);
        
        if(empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong, tidak dapat melakukan checkout.');
        }

        // Calculate total again to ensure it's up-to-date
        $total = 0;
        foreach($cart as $key => $item) {
            $product = \App\Models\Product::find($item['product_id'] ?? $key);
            if (!$product || $product->stock < $item['quantity']) {
                return redirect()->route('cart.index')->with('error', 'Stok untuk produk ' . ($product->name ?? 'Item') . ' tidak mencukupi. Stok saat ini: ' . ($product->stock ?? 0));
            }
            $total += $item['price'] * $item['quantity'];
        }

        try {
            $order = DB::transaction(function () use ($request, $cart, $total) {
                // Simpan Order ke Database
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'total' => $total,
                    'status' => 'pending', // Status awal
                    'payment_method' => $request->payment_method,
                    'address' => $request->address,
                ]);

                // Simpan setiap item di keranjang ke tabel order_items
                foreach ($cart as $key => $details) {
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order->id;
                    // Gunakan product_id yang tersimpan, atau fallback ke key jika data lama
                    $orderItem->product_id = $details['product_id'] ?? $key;
                    $orderItem->qty = $details['quantity'];
                    $orderItem->price = $details['price'];
                    $orderItem->save();

                    // Kurangi stok produk
                    $product = \App\Models\Product::find($orderItem->product_id);
                    if ($product) {
                        $product->decrement('stock', $details['quantity']);
                    }
                }

                // Simpan detail pembayaran ke tabel payments
                Payment::create([
                    'order_id' => $order->id,
                    'method'   => $request->payment_method,
                    'status'   => 'pending', // Default status
                ]);

                return $order;
            });

            // Kosongkan Keranjang hanya jika transaksi sukses
            session()->forget('cart');

            // Redirect ke halaman sukses
            return redirect()->route('checkout.success')->with('order_id', $order->id);

        } catch (\Exception $e) {
            Log::error('Checkout failed: ' . $e->getMessage());
            return redirect()->route('checkout.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function success()
    {
        $order = null;
        if (session('order_id')) {
            $order = Order::find(session('order_id'));
        }
        return view('checkout.success', compact('order'));
    }
}