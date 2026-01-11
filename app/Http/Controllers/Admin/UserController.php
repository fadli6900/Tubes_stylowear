<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua user diurutkan dari yang terbaru
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        // Mengambil pesanan milik user ini, diurutkan dari yang terbaru
        $orders = Order::where('user_id', $user->id)->latest()->get();
        return view('admin.users.show', compact('user', 'orders'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User berhasil dihapus');
    }
}