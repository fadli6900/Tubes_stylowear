<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil - Stylowear</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg text-center max-w-md w-full">
        <div class="flex justify-center mb-4">
            <div class="rounded-full bg-green-100 p-3">
                <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Pembayaran Berhasil!</h2>
        <p class="text-gray-600 mb-6">Terima kasih telah berbelanja. Pesanan Anda telah kami terima dan sedang diproses.</p>
        
        <div class="space-y-3">
            <a href="{{ route('dashboard') }}" class="block w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition">Lihat Pesanan Saya</a>
            <a href="{{ url('/') }}" class="block w-full bg-gray-200 text-gray-800 py-2 rounded-md hover:bg-gray-300 transition">Kembali Belanja</a>
        </div>
    </div>
</body>
</html>