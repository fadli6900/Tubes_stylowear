<div class="fixed inset-y-0 left-0 w-72 
            bg-zinc-900 
            border-r border-zinc-800 
            flex flex-col 
            z-50">

    {{-- LOGO --}}
    <div class="px-6 py-6 border-b border-zinc-800">
        <h1 class="text-2xl font-bold tracking-wide text-white">
            StyloWear
        <p class="text-xs text-zinc-400 mt-1">Admin Panel</p>
    </div>

    {{-- MENU --}}
    <nav class="flex-1 px-4 py-6 overflow-y-auto">
        <ul class="space-y-1 text-sm font-medium">

            {{-- Dashboard --}}
            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="group flex items-center gap-3 px-4 py-3 rounded-xl transition
                   {{ request()->routeIs('admin.dashboard') ? 'text-white'
                        : 'text-zinc-400 hover:text-white hover:bg-zinc-800' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-[#ff2d55]' : 'group-hover:text-[#ff2d55] transition-colors' }}">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M6 16.5v2.25m2.25-2.25v2.25m4.5 0q0 .75.75.75h2.25a.75.75 0 00.75-.75v-2.25m-2.25 2.25v-2.25m-4.5 0q0 .75.75.75h2.25a.75.75 0 00.75-.75v-2.25m-2.25 2.25v-2.25m9-13.5V16.5a2.25 2.25 0 01-2.25 2.25h-2.25M16.5 7.5V16.5a2.25 2.25 0 01-2.25 2.25h-2.25m-4.5 0H3.75" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- Products --}}
            <li>
                <a href="{{ route('admin.products.index') }}"
                   class="group flex items-center gap-3 px-4 py-3 rounded-xl transition
                   {{ request()->routeIs('admin.products.*') ? 'text-white'
                        : 'text-zinc-400 hover:text-white hover:bg-zinc-800' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.products.*') ? 'text-[#ff2d55]' : 'group-hover:text-[#ff2d55] transition-colors' }}">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                    </svg>
                    <span>Products</span>
                </a>
            </li>

            {{-- Categories --}}
            <li>
                <a href="{{ route('admin.categories.index') }}"
                   class="group flex items-center gap-3 px-4 py-3 rounded-xl transition
                   {{ request()->routeIs('admin.categories.*') ? 'text-white'
                        : 'text-zinc-400 hover:text-white hover:bg-zinc-800' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.categories.*') ? 'text-[#ff2d55]' : 'group-hover:text-[#ff2d55] transition-colors' }}">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3zM6 6h.008v.008H6V6z" />
                    </svg>
                    <span>Categories</span>
                </a>
            </li>

            {{-- Orders --}}
            <li>
                <a href="{{ route('admin.orders.index') }}"
                   class="group flex items-center gap-3 px-4 py-3 rounded-xl transition
                   {{ request()->routeIs('admin.orders.*') ? 'text-white'
                        : 'text-zinc-400 hover:text-white hover:bg-zinc-800' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.orders.*') ? 'text-[#ff2d55]' : 'group-hover:text-[#ff2d55] transition-colors' }}">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <span>Orders</span>
                </a>
            </li>

            {{-- Users --}}
            <li>
                <a href="{{ route('admin.users.index') }}"
                   class="group flex items-center gap-3 px-4 py-3 rounded-xl transition
                   {{ request()->routeIs('admin.users.*') ? 'text-white'
                        : 'text-zinc-400 hover:text-white hover:bg-zinc-800' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.users.*') ? 'text-[#ff2d55]' : 'group-hover:text-[#ff2d55] transition-colors' }}">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                    <span>Users</span>
                </a>
            </li>

            {{-- Divider --}}
            <li class="my-4 border-t border-zinc-800"></li>

            {{-- Profile --}}
            <li>
                <a href="{{ route('profile.edit') }}"
                   class="group flex items-center gap-3 px-4 py-3 rounded-xl text-zinc-400 hover:text-white hover:bg-zinc-800 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 group-hover:text-[#ff2d55] transition-colors">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Profile</span>
                </a>
            </li>

            {{-- Logout --}}
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-xl
                               text-zinc-400 hover:text-red-400 hover:bg-zinc-800 transition group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 group-hover:text-red-400 transition-colors">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </li>

        </ul>
    </nav>

    {{-- FOOTER --}}
    <div class="px-6 py-4 border-t border-zinc-800 text-xs text-zinc-500">
        © {{ date('Y') }} StyloWear
    </div>
</div>
