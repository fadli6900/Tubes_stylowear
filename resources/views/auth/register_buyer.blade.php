<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Buyer</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-2xl font-bold">Register as Buyer</h1>
        <form action="{{ route('register.buyer') }}" method="POST" class="max-w-md mx-auto mt-5">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" name="email" id="email" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">Password</label>
                <input type="password" name="password" id="password" class="w-full border rounded px-3 py-2" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Register</button>
        </form>
    </div>
</body>
</html>