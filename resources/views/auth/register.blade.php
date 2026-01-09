<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - StyloWear</title>
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
                    Buat Akun Baru
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Bergabunglah dengan kami untuk pengalaman belanja terbaik
                </p>
            </div>

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

            <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input id="name" name="name" type="text" required 
                            class="mt-1 appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm" 
                            placeholder="Nama Anda" value="{{ old('name') }}">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                        <input id="email" name="email" type="email" required 
                            class="mt-1 appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm" 
                            placeholder="nama@email.com" value="{{ old('email') }}">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" name="password" type="password" required 
                            class="mt-1 appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm" 
                            placeholder="Minimal 8 karakter">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required 
                            class="mt-1 appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm" 
                            placeholder="Ulangi password">
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white btn-brand focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                        Daftar
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
                            Sudah punya akun?
                        </span>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('login') }}" class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                        Masuk ke Akun
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>