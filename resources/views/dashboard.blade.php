@extends('admin.admin')

@section('content')
<div class="space-y-10">

    {{-- HEADER --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black text-black tracking-tighter uppercase italic bg-white inline-block px-4 py-1 rounded-lg shadow-sm">
                Analytics Dashboard
            </h1>
            <p class="text-zinc-500 text-xs font-bold mt-2 uppercase tracking-widest">Real-time Performance Metrics</p>
        </div>
        <div class="text-right hidden md:block">
            <p class="text-zinc-400 text-[10px] font-black uppercase tracking-widest">Current Period</p>
            <p class="text-black font-bold">{{ date('F Y') }}</p>
        </div>
    </div>

    {{-- STAT CARDS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

        {{-- Total Pesanan --}}
        <div class="bg-white p-6 rounded-[2rem] border border-zinc-200 shadow-sm hover:shadow-xl transition-all duration-500 group">
            <div class="flex justify-between items-start mb-6">
                <div class="w-12 h-12 bg-zinc-100 rounded-2xl flex items-center justify-center text-black group-hover:bg-black group-hover:text-white transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                
                @isset($orderPercentageChange)
                    {{-- Logika Warna: Hijau jika naik, Merah jika turun --}}
                    <div class="flex items-center gap-1 px-3 py-1 rounded-full font-black text-[10px] tracking-tighter 
                        {{ $orderPercentageChange >= 0 ? 'bg-emerald-100 text-emerald-600' : 'bg-red-100 text-red-600' }}">
                        <span>{{ $orderPercentageChange >= 0 ? '▲' : '▼' }}</span>
                        <span>{{ abs($orderPercentageChange) }}%</span>
                    </div>
                @endisset
            </div>
            <div>
                <p class="text-zinc-400 text-[10px] font-black uppercase tracking-[0.2em]">Total Orders</p>
                <h2 class="text-4xl font-black text-black mt-1 tracking-tighter">{{ $totalOrders ?? 0 }}</h2>
            </div>
        </div>

        {{-- Total Produk --}}
        <div class="bg-white p-6 rounded-[2rem] border border-zinc-200 shadow-sm hover:shadow-xl transition-all duration-500 group">
            <div class="flex justify-between items-start mb-6">
                <div class="w-12 h-12 bg-zinc-100 rounded-2xl flex items-center justify-center text-black group-hover:bg-black group-hover:text-white transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-zinc-400 text-[10px] font-black uppercase tracking-[0.2em]">Active Products</p>
                <h2 class="text-4xl font-black text-black mt-1 tracking-tighter">{{ $totalProducts ?? 0 }}</h2>
            </div>
        </div>

        {{-- Total User --}}
        <div class="bg-white p-6 rounded-[2rem] border border-zinc-200 shadow-sm hover:shadow-xl transition-all duration-500 group">
            <div class="flex justify-between items-start mb-6">
                <div class="w-12 h-12 bg-zinc-100 rounded-2xl flex items-center justify-center text-black group-hover:bg-black group-hover:text-white transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
                @isset($userPercentageChange)
                    <div class="flex items-center gap-1 px-3 py-1 rounded-full font-black text-[10px] tracking-tighter 
                        {{ $userPercentageChange >= 0 ? 'bg-emerald-100 text-emerald-600' : 'bg-red-100 text-red-600' }}">
                        <span>{{ $userPercentageChange >= 0 ? '▲' : '▼' }}</span>
                        <span>{{ abs($userPercentageChange) }}%</span>
                    </div>
                @endisset
            </div>
            <div>
                <p class="text-zinc-400 text-[10px] font-black uppercase tracking-[0.2em]">Total Customers</p>
                <h2 class="text-4xl font-black text-black mt-1 tracking-tighter">{{ $totalUsers ?? 0 }}</h2>
            </div>
        </div>

        {{-- Pendapatan --}}
        <div class="bg-white p-6 rounded-[2rem] border border-zinc-200 shadow-sm hover:shadow-xl transition-all duration-500 group">
            <div class="flex justify-between items-start mb-6">
                <div class="w-12 h-12 bg-zinc-100 rounded-2xl flex items-center justify-center text-black group-hover:bg-black group-hover:text-white transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                @isset($revenuePercentageChange)
                    <div class="flex items-center gap-1 px-3 py-1 rounded-full font-black text-[10px] tracking-tighter 
                        {{ $revenuePercentageChange >= 0 ? 'bg-emerald-100 text-emerald-600' : 'bg-red-100 text-red-600' }}">
                        <span>{{ $revenuePercentageChange >= 0 ? '▲' : '▼' }}</span>
                        <span>{{ abs($revenuePercentageChange) }}%</span>
                    </div>
                @endisset
            </div>
            <div>
                <p class="text-zinc-400 text-[10px] font-black uppercase tracking-[0.2em]">Net Revenue</p>
                <h2 class="text-3xl font-black text-black mt-1 tracking-tighter">Rp {{ number_format($revenue ?? 0, 0, ',', '.') }}</h2>
            </div>
        </div>

    </div>

    {{-- BOTTOM SECTION --}}
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
        {{-- Pesanan Terbaru --}}
        <div class="bg-white rounded-[2.5rem] border border-zinc-200 shadow-sm p-8">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-lg font-black text-black uppercase tracking-widest italic">Latest Orders</h3>
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
            </div>

            <div class="space-y-4">
                @forelse($latestOrders ?? [] as $order)
                <div class="flex justify-between items-center p-5 rounded-2xl bg-zinc-50 border border-zinc-100 hover:bg-white hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center font-bold text-xs border border-zinc-200 shadow-sm group-hover:bg-black group-hover:text-white transition-colors">
                            #{{ substr($order->code, -2) }}
                        </div>
                        <div>
                            <p class="text-black font-black text-sm uppercase italic">Order {{ $order->code }}</p>
                            <p class="text-zinc-400 text-[10px] font-bold uppercase tracking-tighter">
                                {{ $order->items_count }} items • Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                    <span class="px-4 py-1.5 text-[9px] font-black uppercase rounded-full shadow-sm
                        {{ $order->status === 'completed' ? 'bg-black text-white' : 'bg-zinc-200 text-zinc-600' }}">
                        {{ $order->status }}
                    </span>
                </div>
                @empty
                    <p class="text-zinc-400 text-sm font-bold uppercase tracking-widest text-center py-10 italic">No Data Available</p>
                @endforelse
            </div>
        </div>

        {{-- Produk Terlaris --}}
        <div class="bg-white rounded-[2.5rem] border border-zinc-200 shadow-sm p-8">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-lg font-black text-black uppercase tracking-widest italic">Best Sellers</h3>
                <svg class="w-5 h-5 text-zinc-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
            </div>

            <div class="space-y-4">
                @forelse($bestSellingProducts ?? [] as $product)
                <div class="flex justify-between items-center p-5 rounded-2xl hover:bg-zinc-50 transition-all border border-transparent hover:border-zinc-100 group">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-zinc-100 rounded-xl overflow-hidden border border-zinc-200">
                             {{-- Asumsi ada image, jika tidak pakai inisial --}}
                             <div class="w-full h-full flex items-center justify-center text-[10px] font-black text-zinc-400 uppercase">IMG</div>
                        </div>
                        <div>
                            <p class="text-black font-black text-sm uppercase tracking-tight group-hover:text-emerald-600 transition-colors">{{ $product->name }}</p>
                            <p class="text-zinc-400 text-[10px] font-black uppercase tracking-widest">{{ $product->sold }} Sold</p>
                        </div>
                    </div>
                    <p class="text-black font-black text-sm tracking-tighter">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                </div>
                @empty
                    <p class="text-zinc-400 text-sm font-bold uppercase tracking-widest text-center py-10 italic">No Data Available</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection