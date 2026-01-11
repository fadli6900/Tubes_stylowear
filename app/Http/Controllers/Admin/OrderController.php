<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

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
        $order->update(['status' => 'pemrosesan']);
        return redirect()->back()->with('success', 'Pesanan berhasil dikonfirmasi.');
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
