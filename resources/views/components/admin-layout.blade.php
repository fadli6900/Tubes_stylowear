<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StyloWear Dashboard</title>
    
    <!-- Tailwind CSS (CDN for instant usage, replace with npm run dev in production) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: '#ff2d55',
                    }
                }
            }
        }
    </script>
    
    @stack('styles')
</head>
<body class="bg-[#09090b] text-white font-sans antialiased" x-data="{ sidebarOpen: false }">

    <!-- Mobile Header -->
    <div class="lg:hidden flex items-center justify-between p-4 border-b border-zinc-800 bg-[#16161a]">
        <div class="font-bold text-xl tracking-wider">STYLO<span class="text-[#ff2d55]">WEAR</span></div>
        <button @click="sidebarOpen = !sidebarOpen" class="text-zinc-400 hover:text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
    </div>

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside 
            class="fixed inset-y-0 left-0 z-50 w-64 bg-[#16161a] border-r border-zinc-800 transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-auto"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            @click.away="sidebarOpen = false"
        >
            <!-- Logo -->
            <div class="h-16 flex items-center px-8 border-b border-zinc-800">
                <div class="font-bold text-2xl tracking-wider">STYLO<span class="text-[#ff2d55]">WEAR</span></div>
            </div>

            <!-- Menu -->
            <nav class="p-4 space-y-2">
                <a href="#" class="flex items-center px-4 py-3 bg-[#ff2d55]/10 text-[#ff2d55] rounded-lg border border-[#ff2d55]/20">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="font-medium">Dashboard</span>
                </a>
                
                <a href="#" class="flex items-center px-4 py-3 text-zinc-400 hover:text-white hover:bg-zinc-800/50 rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    <span class="font-medium">Pesanan</span>
                </a>

                <a href="#" class="flex items-center px-4 py-3 text-zinc-400 hover:text-white hover:bg-zinc-800/50 rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                    <span class="font-medium">Produk</span>
                </a>

                <a href="#" class="flex items-center px-4 py-3 text-zinc-400 hover:text-white hover:bg-zinc-800/50 rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <span class="font-medium">Pelanggan</span>
                </a>
            </nav>
            
            <!-- User Profile (Bottom) -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-zinc-800">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-zinc-700 flex items-center justify-center text-white font-bold">A</div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">Admin User</p>
                        <p class="text-xs text-zinc-500">admin@stylowear.com</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4 lg:p-8 overflow-y-auto h-screen">
            <!-- Top Bar (Search & Notif) -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-bold text-white">Dashboard Overview</h1>
                <!-- Add Topbar items here if needed -->
            </div>

            {{ $slot }}
        </main>
    </div>

    @stack('scripts')
</body>
</html>