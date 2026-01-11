@extends('admin.admin')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-light text-white">Detail User: {{ $user->name }}</h1>
        <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-white/10 hover:bg-white/20 text-white rounded-lg transition-colors">
            Kembali
        </a>
    </div>

    <!-- User Info -->
    <div class="bg-white/5 backdrop-blur-sm rounded-xl border border-white/10 p-6">
        <h2 class="text-xl font-medium text-white mb-4">Informasi User</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-zinc-400">
            <div>
                <span class="block text-xs uppercase text-zinc-500">Nama</span>
                <span class="text-zinc-200">{{ $user->name }}</span>
            </div>
            <div>
                <span class="block text-xs uppercase text-zinc-500">Email</span>
                <span class="text-zinc-200">{{ $user->email }}</span>
            </div>
            <div>
                <span class="block text-xs uppercase text-zinc-500">Bergabung Sejak</span>
                <span class="text-zinc-200">{{ $user->created_at->format('d M Y') }}</span>
            </div>
            <div>
                <span class="block text-xs uppercase text-zinc-500">Role</span>
                <span class="text-zinc-200">{{ ucfirst($user->role ?? 'User') }}</span>
            </div>
        </div>
    </div>

    <!-- Order History -->
    <div class="bg-white/5 backdrop-blur-sm rounded-xl border border-white/10 overflow-hidden">
        <div class="p-6 border-b border-white/10">
            <h2 class="text-xl font-medium text-white">Riwayat Pesanan</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-zinc-400">
                <thead class="bg-white/5 text-zinc-200 uppercase font-medium">
                    <tr>
                        <th class="px-6 py-4">Order ID</th>
                        <th class="px-6 py-4">Total</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse($orders as $order)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4 font-medium text-white">#{{ $order->id }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs rounded-full
                                {{ $order->status === 'selesai' ? 'bg-emerald-500/20 text-emerald-400' :
                                ($order->status === 'pending' ? 'bg-orange-500/20 text-orange-400' :
                                ($order->status === 'pemrosesan' ? 'bg-blue-500/20 text-blue-400' :
                                ($order->status === 'shipping' ? 'bg-indigo-500/20 text-indigo-400' :
                                'bg-zinc-500/20 text-zinc-400'))) }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $order->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-indigo-400 hover:text-indigo-300">Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-zinc-500">User ini belum melakukan pemesanan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
