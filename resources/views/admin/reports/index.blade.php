@extends('admin.admin')

@section('content')
<div class="space-y-10">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-light text-white">Laporan & Analitik</h1>
    </div>

    <!-- Top 10 Produk Terlaris -->
    <div class="bg-white/5 backdrop-blur-sm rounded-xl border border-white/10 p-6">
        <h2 class="text-xl font-medium text-white mb-6">10 Produk Terlaris</h2>
        <!-- Visualisasi Bar Chart Sederhana -->
        <div class="space-y-4">
            @foreach($labels as $index => $label)
                @php 
                    $count = $data[$index];
                    $max = $data->max() > 0 ? $data->max() : 1;
                    $percentage = ($count / $max) * 100;
                @endphp
                <div>
                    <div class="flex justify-between text-sm text-zinc-400 mb-1">
                        <span>{{ $label }}</span>
                        <span>{{ $count }} terjual</span>
                    </div>
                    <div class="w-full bg-white/10 rounded-full h-2.5">
                        <div class="bg-indigo-500 h-2.5 rounded-full" style="width: {{ $percentage }}%"></div>
                    </div>
                </div>
            @endforeach
            @if(count($labels) == 0)
                <p class="text-zinc-500 text-center">Belum ada data penjualan.</p>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Stok Menipis -->
        <div class="bg-white/5 backdrop-blur-sm rounded-xl border border-white/10 overflow-hidden">
            <div class="p-6 border-b border-white/10">
                <h2 class="text-xl font-medium text-white">Stok Menipis (< 10)</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-zinc-400">
                    <thead class="bg-white/5 text-zinc-200 uppercase font-medium">
                        <tr>
                            <th class="px-6 py-4">Produk</th>
                            <th class="px-6 py-4 text-right">Sisa Stok</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        @forelse($lowStockProducts as $product)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4">{{ $product->name }}</td>
                            <td class="px-6 py-4 text-right text-red-400 font-bold">{{ $product->stock }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="px-6 py-8 text-center text-zinc-500">Aman! Tidak ada stok menipis.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Performa Kategori -->
        <div class="bg-white/5 backdrop-blur-sm rounded-xl border border-white/10 overflow-hidden">
            <div class="p-6 border-b border-white/10">
                <h2 class="text-xl font-medium text-white">Performa Kategori</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-zinc-400">
                    <thead class="bg-white/5 text-zinc-200 uppercase font-medium">
                        <tr>
                            <th class="px-6 py-4">Kategori</th>
                            <th class="px-6 py-4 text-right">Terjual</th>
                            <th class="px-6 py-4 text-right">Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        @forelse($categoryStats as $stat)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4">{{ $stat->name }}</td>
                            <td class="px-6 py-4 text-right">{{ $stat->total_sold }}</td>
                            <td class="px-6 py-4 text-right text-emerald-400">Rp {{ number_format($stat->total_revenue, 0, ',', '.') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-8 text-center text-zinc-500">Belum ada data.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection