@extends('admin.admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-8">

    <div>
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-1">
            <a href="{{ url('/admin/dashboard') }}" class="hover:text-red-600 transition-colors">Dashboard</a>
            <span>/</span>
            <a href="{{ route('admin.users.index') }}" class="hover:text-red-600 transition-colors">Users</a>
            <span>/</span>
            <span class="text-gray-900">Tambah</span>
        </div>
        <h1 class="text-2xl font-semibold text-gray-900">Tambah Pengguna Baru</h1>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-800 p-4 rounded-lg">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.users.store') }}" class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Nama --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:ring-red-500 focus:border-red-500" required>
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:ring-red-500 focus:border-red-500" required>
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" name="password" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:ring-red-500 focus:border-red-500" required>
            </div>

            {{-- Konfirmasi Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:ring-red-500 focus:border-red-500" required>
            </div>
        </div>

        <hr class="border-gray-100">
        <h3 class="text-lg font-medium text-gray-900">Informasi Kontak & Alamat</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Telepon --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:ring-red-500 focus:border-red-500">
            </div>

            {{-- Kota --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kota</label>
                <input type="text" name="city" value="{{ old('city') }}" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:ring-red-500 focus:border-red-500">
            </div>

            {{-- Negara --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Negara</label>
                <input type="text" name="country" value="{{ old('country') }}" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:ring-red-500 focus:border-red-500">
            </div>

            {{-- Kode Pos --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kode Pos</label>
                <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:ring-red-500 focus:border-red-500">
            </div>
        </div>

        {{-- Alamat --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
            <textarea name="address" rows="3" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:ring-red-500 focus:border-red-500">{{ old('address') }}</textarea>
        </div>

        <div class="flex justify-end gap-4 pt-6 border-t border-gray-100">
            <a href="{{ route('admin.users.index') }}" class="px-6 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 transition duration-200">Batal</a>
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-red-600 text-white font-medium hover:bg-red-700 transition duration-200 shadow-sm">Simpan Pengguna</button>
        </div>
    </form>
</div>
@endsection