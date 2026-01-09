<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@stylowear.com',
            'password' => Hash::make('password'), // Ganti dengan password yang aman
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}