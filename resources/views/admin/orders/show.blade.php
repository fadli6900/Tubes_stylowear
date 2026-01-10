@extends('admin.admin')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-light text-white">Detail Pesanan #{{ $order->id }}</h1>
        <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 bg-white/10 hover:bg-white/20 text-white rounded-lg transition-colors">
            Kembali
        </a>
    </div>

    <!-- Order Info Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Customer Info -->
        <div class="bg-white/5 backdrop-blur-sm rounded-xl border border-white/10 p-6">
            <h2 class="text-xl font-medium text-white mb-4">Informasi Pelanggan</h2>
            <div class="space-y-3 text-zinc-400">
                <div class="flex">
                    <span class="w-32">Nama</span>
                    <span class="text-zinc-200">: {{ $order->user->name ?? 'Guest' }}</span>
                </div>
                <div class="flex">
                    <span class="w-32">Email</span>
                    <span class="text-zinc-200">: {{ $order->user->email ?? '-' }}</span>
                </div>
                <div class="flex">
                    <span class="w-32">Tanggal Order</span>
                    <span class="text-zinc-200">: {{ $order->created_at->format('d M Y H:i') }}</span>
                </div>
            </div>
        </div>

        <!-- Shipping & Payment Info -->
        <div class="bg-white/5 backdrop-blur-sm rounded-xl border border-white/10 p-6">
            <h2 class="text-xl font-medium text-white mb-4">Pengiriman & Pembayaran</h2>
            <div class="space-y-3 text-zinc-400">
                <div class="flex">
                    <span class="w-32">Alamat</span>
                    <span class="text-zinc-200">: {{ $order->address }}</span>
                </div>
                <div class="flex">
                    <span class="w-32">Metode Bayar</span>
                    <span class="text-zinc-200">: {{ ucfirst($order->payment_method) }}</span>
                </div>
                <div class="flex items-center">
                    <span class="w-32">Status</span>
                    <span>: 
                        <span class="px-3 py-1 text-xs rounded-full
                            {{ $order->status === 'completed' ? 'bg-emerald-500/20 text-emerald-400' : 
                            ($order->status === 'pending' ? 'bg-orange-500/20 text-orange-400' : 
                            ($order->status === 'processing' ? 'bg-blue-500/20 text-blue-400' : 
                            ($order->status === 'shipped' ? 'bg-indigo-500/20 text-indigo-400' : 
                            ($order->status === 'delivered' ? 'bg-green-500/20 text-green-400' : 
                            'bg-red-500/20 text-red-400')))) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Items -->
    <div class="bg-white/5 backdrop-blur-sm rounded-xl border border-white/10 overflow-hidden">
        <div class="p-6 border-b border-white/10">
            <h2 class="text-xl font-medium text-white">Item Pesanan</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-zinc-400">
                <thead class="bg-white/5 text-zinc-200 uppercase font-medium">
                    <tr>
                        <th class="px-6 py-4">Produk</th>
                        <th class="px-6 py-4">Harga Satuan</th>
                        <th class="px-6 py-4">Jumlah</th>
                        <th class="px-6 py-4 text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @foreach($order->items as $item)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4 text-white">{{ $item->product->name ?? 'Produk tidak ditemukan' }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ $item->qty }}</td>
                        <td class="px-6 py-4 text-right text-white">Rp {{ number_format($item->price * $item->qty, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-white/5">
                    <tr>
                        <th colspan="3" class="px-6 py-4 text-right text-zinc-200 font-medium">Total Pembayaran</th>
                        <th class="px-6 py-4 text-right text-white font-bold text-lg">Rp {{ number_format($order->total, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection