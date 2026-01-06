@extends('admin.admin')

@section('content')
<div class="space-y-12 fade-in">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-3xl font-light text-white">Dashboard</h1>
            <p class="text-zinc-400 text-sm mt-1">Overview of your store's performance.</p>
        </div>
        <div class="text-zinc-500 text-sm font-medium bg-white/5 px-4 py-2 rounded-lg border border-white/5">
            {{ now()->format('l, d F Y') }}
        </div>
    </div>

    {{-- STAT CARDS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-8">

        {{-- Total Orders --}}
        <div class="bg-zinc-900 p-6 rounded-2xl border border-zinc-800 hover:border-zinc-700 transition-all duration-300 group">
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <p class="text-zinc-500 text-xs font-bold uppercase tracking-wider">Total Orders</p>
                    <div class="w-8 h-8 bg-indigo-500/10 rounded-lg flex items-center justify-center text-indigo-500">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <h2 class="text-3xl font-semibold text-white">{{ number_format($totalOrders) }}</h2>
                    <div class="flex items-center mt-2 text-sm">
                        <span class="text-emerald-400 font-medium flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                            {{ $orderGrowth }}%
                        </span>
                        <span class="text-zinc-500 ml-2">vs last month</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Products --}}
        <div class="bg-zinc-900 p-6 rounded-2xl border border-zinc-800 hover:border-zinc-700 transition-all duration-300 group">
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <p class="text-zinc-500 text-xs font-bold uppercase tracking-wider">Total Products</p>
                    <div class="w-8 h-8 bg-pink-500/10 rounded-lg flex items-center justify-center text-pink-500">
                        <svg class="w-5 h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <h2 class="text-3xl font-semibold text-white">{{ number_format($totalProducts) }}</h2>
                    <div class="flex items-center mt-2 text-sm">
                        <span class="text-zinc-500">Active items in store</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Users --}}
        <div class="bg-zinc-900 p-6 rounded-2xl border border-zinc-800 hover:border-zinc-700 transition-all duration-300 group">
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <p class="text-zinc-500 text-xs font-bold uppercase tracking-wider">Total Users</p>
                    <div class="w-8 h-8 bg-blue-500/10 rounded-lg flex items-center justify-center text-blue-500">
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <h2 class="text-3xl font-semibold text-white">{{ number_format($totalUsers) }}</h2>
                    <div class="flex items-center mt-2 text-sm">
                        <span class="text-emerald-400 font-medium flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                            {{ $userGrowth }}%
                        </span>
                        <span class="text-zinc-500 ml-2">vs last month</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Revenue --}}
        <div class="bg-zinc-900 p-6 rounded-2xl border border-zinc-800 hover:border-zinc-700 transition-all duration-300 group">
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <p class="text-zinc-500 text-xs font-bold uppercase tracking-wider">Revenue</p>
                    <div class="w-8 h-8 bg-emerald-500/10 rounded-lg flex items-center justify-center text-emerald-500">
                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <h2 class="text-3xl font-semibold text-white">
                        Rp {{ number_format($revenue, 0, ',', '.') }}
                    </h2>
                    <div class="flex items-center mt-2 text-sm">
                        <span class="text-emerald-400 font-medium flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                            {{ $revenueGrowth }}%
                        </span>
                        <span class="text-zinc-500 ml-2">vs last month</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- BOTTOM SECTION --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

        {{-- Recent Orders --}}
        <div class="xl:col-span-2 bg-zinc-900/50 backdrop-blur-md rounded-2xl border border-white/5 overflow-hidden">
            <div class="p-6 border-b border-white/5 flex justify-between items-center">
                <h3 class="text-lg font-medium text-white">Recent Orders</h3>
                <a href="{{ route('admin.orders.index') }}" class="text-sm text-indigo-400 hover:text-indigo-300 transition-colors">View All</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-zinc-400">
                    <thead class="bg-white/5 text-zinc-200 uppercase font-medium text-xs">
                        <tr>
                            <th class="px-6 py-4">Order ID</th>
                            <th class="px-6 py-4">Customer</th>
                            <th class="px-6 py-4">Total</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($latestOrders as $order)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4 font-medium text-white">#{{ $order->id }}</td>
                            <td class="px-6 py-4">{{ $order->user->name ?? 'Guest' }}</td>
                            <td class="px-6 py-4">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium border
                                    {{ $order->status === 'completed' ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' :
                                       ($order->status === 'pending' ? 'bg-yellow-500/10 text-yellow-400 border-yellow-500/20' :
                                       'bg-zinc-500/10 text-zinc-400 border-zinc-500/20') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.orders.show', $order) }}" class="text-zinc-400 hover:text-white transition-colors">
                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-zinc-500">No recent orders.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Best Selling Products --}}
        <div class="bg-zinc-900/50 backdrop-blur-md rounded-2xl border border-white/5">
            <div class="p-6 border-b border-white/5">
                <h3 class="text-lg font-medium text-white">Newest Products</h3>
            </div>

            <div class="p-6 space-y-4">
                @forelse($bestSellingProducts as $product)
                <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-white/5 transition-colors border border-transparent hover:border-white/5 group">
                    <div class="w-12 h-12 bg-zinc-800 rounded-lg flex items-center justify-center text-zinc-500">
                        {{-- Placeholder Icon if no image --}}
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="space-y-1">
                        <p class="text-white font-medium text-sm group-hover:text-indigo-400 transition-colors">{{ $product->name }}</p>
                        <p class="text-zinc-500 text-xs">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
                @empty
                <p class="text-zinc-500 text-center py-4">No products found.</p>
                @endforelse
            </div>
        </div>

    </div>
</div>
@endsection
