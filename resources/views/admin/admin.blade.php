<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - Stylowear</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
        
        /* Animasi halus untuk konten */
        .fade-in { animation: fadeIn 0.5s ease-out forwards; opacity: 0; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-black text-zinc-100 antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 z-50 w-64 bg-zinc-900 border-r border-white/5 transition-transform duration-300 ease-in-out transform lg:static lg:translate-x-0"
               :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            
            <!-- Logo -->
            <div class="flex items-center justify-center h-20 border-b border-white/5">
                <h1 class="text-2xl font-bold tracking-wider uppercase text-white">
                    Stylo<span class="text-indigo-500">wear</span>
                </h1>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/20' : 'text-zinc-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                
                <p class="px-4 mt-6 mb-2 text-xs font-semibold text-zinc-500 uppercase tracking-wider">Management</p>
                
                <a href="{{ route('admin.categories.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.categories*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/20' : 'text-zinc-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                    Categories
                </a>
                <a href="{{ route('admin.orders.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.orders*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/20' : 'text-zinc-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    Orders
                </a>
                <a href="{{ route('admin.products.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.products*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/20' : 'text-zinc-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    Products
                </a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.users*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/20' : 'text-zinc-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Users
                </a>
                <a href="{{ route('admin.reports.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.reports*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/20' : 'text-zinc-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Laporan
                </a>
            </nav>

            <!-- User Profile (Bottom Sidebar) -->
            <div class="p-4 border-t border-white/5">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-indigo-500 flex items-center justify-center text-white font-bold shadow-lg shadow-indigo-500/20">
                        {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                        <p class="text-xs text-zinc-500 truncate">Administrator</p>
                    </div>
                </div>
                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 py-2 text-sm font-medium text-zinc-400 hover:bg-red-500/10 hover:text-red-400 rounded-xl transition-all duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col overflow-hidden bg-black">
            <!-- Mobile Header -->
            <header class="flex items-center justify-between p-4 lg:hidden border-b border-white/5 bg-zinc-900">
                <span class="text-lg font-bold text-white">Stylowear</span>
                <button @click="sidebarOpen = !sidebarOpen" class="text-zinc-400 hover:text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 md:p-8">
                @yield('content')
            </main>
        </div>

        <!-- Mobile Overlay -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" x-cloak class="fixed inset-0 z-40 bg-black/80 backdrop-blur-sm lg:hidden"></div>
    </div>
</body>
</html>