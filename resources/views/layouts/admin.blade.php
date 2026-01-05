<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>StyloWear Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-900 text-white">
    {{-- Navbar --}}
    @include('layouts.navbar')

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main Content --}}
        <div class="flex-1">
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
