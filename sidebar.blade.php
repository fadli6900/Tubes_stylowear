<aside class="w-64 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 min-h-screen flex flex-col transition-all duration-300">
    <!-- Logo -->
    <div class="h-16 flex items-center justify-center border-b border-gray-200 dark:border-gray-700">
        <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-800 dark:text-white">
            Stylowear
        </a>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-4">
        <ul class="space-y-1 px-2">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg dark:text-gray-300 dark:hover:bg-gray-700 group">
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>

            <!-- Master Data Section -->
            <li class="px-4 mt-4 mb-2 text-xs font-semibold text-gray-500 uppercase dark:text-gray-400">
                Master Data
            </li>
            <li>
                <a href="{{ route('categories.index') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg dark:text-gray-300 dark:hover:bg-gray-700 group">
                    <span class="ml-3">Categories</span>
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg dark:text-gray-300 dark:hover:bg-gray-700 group">
                    <span class="ml-3">Products</span>
                </a>
            </li>

            <!-- Transactions Section -->
            <li class="px-4 mt-4 mb-2 text-xs font-semibold text-gray-500 uppercase dark:text-gray-400">
                Transactions
            </li>
            <li>
                <a href="{{ route('orders.index') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg dark:text-gray-300 dark:hover:bg-gray-700 group">
                    <span class="ml-3">Orders</span>
                </a>
            </li>

            @if(auth()->check() && auth()->user()->role === 'admin')
            <!-- Admin Section -->
            <li class="px-4 mt-4 mb-2 text-xs font-semibold text-gray-500 uppercase dark:text-gray-400">
                Administrator
            </li>
            <li>
                <a href="{{ route('users.index') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg dark:text-gray-300 dark:hover:bg-gray-700 group">
                    <span class="ml-3">Users</span>
                </a>
            </li>
            @endif
        </ul>
    </nav>

    <!-- Footer / Logout -->
    <div class="p-4 border-t border-gray-200 dark:border-gray-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center w-full px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg dark:text-red-400 dark:hover:bg-gray-700 transition-colors">
                <span class="ml-3">Logout</span>
            </button>
        </form>
    </div>
</aside>