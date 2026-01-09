<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - StyloWear</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .brand-color { color: #dc143c; }
        .btn-brand { background-color: #dc143c; }
        .btn-brand:hover { background-color: #b91032; }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-lg border border-gray-100">
            <div class="text-center">
                <a href="{{ url('/') }}" class="text-3xl font-bold text-gray-900 tracking-tight">
                    Stylo<span class="brand-color">Wear</span>
                </a>
                <h2 class="mt-6 text-2xl font-bold text-gray-900">
                    Selamat Datang Kembali
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Masuk untuk mengelola pesanan Anda
                </p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="bg-green-50 text-green-600 p-3 rounded-lg text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="bg-red-50 text-red-600 p-3 rounded-lg text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                        <input id="email" name="email" type="email" autocomplete="email" required 
                            class="mt-1 appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm" 
                            placeholder="nama@email.com" value="{{ old('email') }}">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required 
                            class="mt-1 appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm" 
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                            Ingat saya
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-red-600 hover:text-red-500">
                                Lupa password?
                            </a>
                        </div>
                    @endif
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white btn-brand focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                        Masuk
                    </button>
                </div>
            </form>

            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">
                            Belum punya akun?
                        </span>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                        Daftar Akun Baru
                    </a>
                </div>
            </div>
        </div>
        
        <p class="mt-8 text-center text-xs text-gray-500">
            &copy; {{ date('Y') }} StyloWear. All rights reserved.
        </p>
    </div>
</body>
</html>