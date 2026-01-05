<aside class="w-64 bg-zinc-950 border-r border-zinc-800 h-screen sticky top-0 flex flex-col transition-all duration-300 hidden md:flex">
    <!-- Logo -->
    <div class="h-16 flex items-center px-6 border-b border-zinc-800/50">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 text-xl font-bold text-white tracking-tight">
            <div class="w-8 h-8 bg-gradient-to-br from-[#ff2d55] to-pink-600 rounded-lg flex items-center justify-center text-white shadow-lg shadow-pink-500/20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-white to-zinc-400">StyloWear</span>
        </a>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-6 px-3 space-y-1">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-[#ff2d55]/10 text-[#ff2d55]' : 'text-zinc-400 hover:text-white hover:bg-white/5' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-[#ff2d55]' : 'text-zinc-500 group-hover:text-white' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
            </svg>
            Dashboard
        </a>

        <!-- Master Data Section -->
        <div class="px-3 mt-6 mb-2 text-[10px] font-bold text-zinc-600 uppercase tracking-wider">
            Master Data
        </div>
        
        <a href="{{ route('admin.categories.index') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.categories.*') ? 'bg-[#ff2d55]/10 text-[#ff2d55]' : 'text-zinc-400 hover:text-white hover:bg-white/5' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.categories.*') ? 'text-[#ff2d55]' : 'text-zinc-500 group-hover:text-white' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
            </svg>
            Kategori
        </a>
        
        <a href="{{ route('admin.products.index') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.products.*') ? 'bg-[#ff2d55]/10 text-[#ff2d55]' : 'text-zinc-400 hover:text-white hover:bg-white/5' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.products.*') ? 'text-[#ff2d55]' : 'text-zinc-500 group-hover:text-white' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            Produk
        </a>

        <!-- Transactions Section -->
        <div class="px-3 mt-6 mb-2 text-[10px] font-bold text-zinc-600 uppercase tracking-wider">
            Transactions
        </div>
        
        <a href="{{ route('admin.orders.index') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.orders.*') ? 'bg-[#ff2d55]/10 text-[#ff2d55]' : 'text-zinc-400 hover:text-white hover:bg-white/5' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.orders.*') ? 'text-[#ff2d55]' : 'text-zinc-500 group-hover:text-white' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
            </svg>
            Pesanan
        </a>

        @if(auth()->check() && auth()->user()->role === 'admin')
        <!-- Admin Section -->
        <div class="px-3 mt-6 mb-2 text-[10px] font-bold text-zinc-600 uppercase tracking-wider">
            Administrator
        </div>
        
        <a href="{{ route('admin.users.index') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.users.*') ? 'bg-[#ff2d55]/10 text-[#ff2d55]' : 'text-zinc-400 hover:text-white hover:bg-white/5' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.users.*') ? 'text-[#ff2d55]' : 'text-zinc-500 group-hover:text-white' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
            </svg>
            Pengguna
        </a>
        @endif
    </nav>

    <!-- Footer / Logout -->
    <div class="p-4 border-t border-zinc-800/50">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center w-full px-3 py-2.5 text-sm font-medium text-zinc-400 hover:text-red-400 hover:bg-red-400/10 rounded-lg transition-all duration-200 group">
                <svg class="w-5 h-5 mr-3 text-zinc-500 group-hover:text-red-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>
