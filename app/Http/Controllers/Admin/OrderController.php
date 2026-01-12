<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    public function store(Request $request)
    {
        // Validation and store logic
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total' => 'required|numeric',
            'status' => 'required|string',
        ]);

        Order::create($request->all());

        return redirect()->route('admin.orders.index')->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        // Validation and update logic
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $order->update($request->all());

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }

    public function confirm(Order $order)
    {
        DB::transaction(function () use ($order) {
            // 1. Ubah status order menjadi 'pemrosesan'
            $order->update(['status' => 'pemrosesan']);
            
            // 2. Ubah status pembayaran menjadi 'paid' (jika ada datanya)
            $payment = Payment::where('order_id', $order->id)->first();
            if ($payment) {
                $payment->update(['status' => 'confirmed']);
            }
        });

        return redirect()->back()->with('success', 'Pembayaran dikonfirmasi. Status pesanan diubah menjadi Pemrosesan.');
    }

    public function shipping(Order $order)
    {
        $order->update(['status' => 'shipping']);
        return redirect()->back()->with('success', 'Status pesanan diubah menjadi Shipping.');
    }

    public function complete(Order $order)
    {
        $order->update(['status' => 'selesai']);
        return redirect()->back()->with('success', 'Status pesanan diubah menjadi Selesai.');
    }
}
