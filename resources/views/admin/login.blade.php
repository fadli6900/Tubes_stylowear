<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Stylowear</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-black text-zinc-100 antialiased flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 space-y-6 bg-zinc-900 rounded-2xl border border-white/5 shadow-xl">
        <div class="text-center">
            <h1 class="text-2xl font-bold tracking-wider uppercase text-white mb-2">
                Stylo<span class="text-indigo-500">wear</span>
            </h1>
            <h2 class="text-xl font-semibold text-zinc-300">Masuk ke Akun Anda</h2>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-zinc-400 mb-1">Email</label>
                <input type="email" name="email" id="email" required class="w-full px-4 py-2 bg-black border border-white/10 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-white placeholder-zinc-600" placeholder="nama@email.com">
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-zinc-400 mb-1">Password</label>
                <input type="password" name="password" id="password" required class="w-full px-4 py-2 bg-black border border-white/10 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-white placeholder-zinc-600">
            </div>

            <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors duration-200 shadow-lg shadow-indigo-500/20">
                Masuk
            </button>
        </form>

        <div class="text-center text-sm text-zinc-500">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300 font-medium">Daftar sekarang</a>
        </div>
    </div>
</body>
</html>