<header class="bg-zinc-800 px-6 py-4 flex justify-between items-center">
    <h2 class="text-lg font-semibold">Admin Dashboard</h2>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="text-sm text-red-400 hover:underline">
            Logout
        </button>
    </form>
</header>
