<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->get(); // Show only non-admin users
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $orders = $user->orders()->with('items', 'payment')->get();
        return view('admin.users.show', compact('user', 'orders'));
    }

    // Add other methods as needed
}
