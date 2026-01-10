@extends('admin.admin')

@section('content')
<div class="space-y-10">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-light text-white">Orders</h1>
    </div>

    <div class="bg-white/5 backdrop-blur-sm rounded-xl border border-white/10 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-zinc-400">
                <thead class="bg-white/5 text-zinc-200 uppercase font-medium">
                    <tr>
                        <th class="px-6 py-4">Order ID</th>
                        <th class="px-6 py-4">User</th>
                        <th class="px-6 py-4">Total</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Order Date</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse($orders ?? [] as $order)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4 font-medium text-white">#{{ $order->id }}</td>
                        <td class="px-6 py-4">{{ $order->user ? $order->user->name : 'N/A' }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs rounded-full
                                {{ $order->status === 'completed'
                                    ? 'bg-emerald-500/20 text-emerald-400'
                                    : ($order->status === 'pending' ? 'bg-orange-500/20 text-orange-400' :
                                    ($order->status === 'processing' ? 'bg-blue-500/20 text-blue-400' :
                                    ($order->status === 'shipped' ? 'bg-indigo-500/20 text-indigo-400' :
                                    ($order->status === 'delivered' ? 'bg-green-500/20 text-green-400' :
                                    'bg-red-500/20 text-red-400')))) }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $order->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-indigo-400 hover:text-indigo-300">View</a>
                            @if($order->status === 'pending')
                            <form action="{{ route('admin.orders.confirm', $order) }}" method="POST" class="inline-block" onsubmit="return confirm('Konfirmasi pesanan ini?');">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-emerald-400 hover:text-emerald-300">Konfirmasi</button>
                            </form>
                            @endif
                            <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this order?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-zinc-500">No orders found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection