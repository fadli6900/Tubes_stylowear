<div class="h-full flex flex-col bg-white dark:bg-gray-800 border-r border-gray-100 dark:border-gray-700">
    <div class="h-16 flex items-center justify-center border-b border-gray-100 dark:border-gray-700">
        <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-gray-800 dark:text-gray-200">
            Admin Panel
        </a>
    </div>

    <nav class="mt-6 px-4 space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100' : '' }}">
            <span class="mr-3">📊</span>
            Dashboard
        </a>

        <a href="{{ route('admin.categories.index') }}" class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md {{ request()->routeIs('admin.categories.*') ? 'bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100' : '' }}">
            <span class="mr-3">📁</span>
            Categories
        </a>

        <a href="{{ route('admin.products.index') }}" class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md {{ request()->routeIs('admin.products.*') ? 'bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100' : '' }}">
            <span class="mr-3">📦</span>
            Products
        </a>

        <a href="{{ route('admin.orders.index') }}" class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md {{ request()->routeIs('admin.orders.*') ? 'bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100' : '' }}">
            <span class="mr-3">🛍️</span>
            Orders
        </a>

        <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md {{ request()->routeIs('admin.users.*') ? 'bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100' : '' }}">
            <span class="mr-3">👥</span>
            Users
        </a>
    </nav>
</div>