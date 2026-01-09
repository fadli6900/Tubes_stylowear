<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // For logging payment errors

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
        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Simpan Order ke Database
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'status' => 'pending', // Status awal
            'payment_method' => $request->payment_method,
            'address' => $request->address,
        ]);

        // Simpan setiap item di keranjang ke tabel order_items
        foreach ($cart as $id => $details) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $id,
                'quantity'   => $details['quantity'],
                'price'      => $details['price'],
            ]);
        }

        // Simpan detail pembayaran ke tabel payments
        try {
            Payment::create([
                'order_id' => $order->id,
                'method'   => $request->payment_method,
                'status'   => 'pending', // Default status
            ]);
        } catch (\Exception $e) {
            Log::error('Payment creation failed: ' . $e->getMessage());
            return redirect()->route('checkout.index')->with('error', 'Terjadi kesalahan saat memproses pembayaran.');
        }

        // Kosongkan Keranjang
        session()->forget('cart');

        // Redirect ke halaman sukses (sesuai route checkout.success)
        return redirect()->route('checkout.success')->with('status', 'Pembayaran berhasil diproses! Pesanan sedang disiapkan.');
    }

    public function success()
    {
        return view('checkout.success');
    }
}