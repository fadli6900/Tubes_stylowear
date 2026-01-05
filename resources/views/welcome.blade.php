<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StyloWear - Fashion Store</title>
    <style>
        /* Dasar & Font */
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #f8f9fa;
            color: #333;
        }

        /* Navbar Sederhana */
        .navbar {
            background: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .brand {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
        }
        .brand span { color: #dc143c; }
        
        .nav-links a {
            text-decoration: none;
            color: #555;
            margin-left: 20px;
            font-weight: 500;
            transition: color 0.3s;
        }
        .nav-links a:hover { color: #dc143c; }
        .btn-login {
            background: #dc143c;
            color: white !important;
            padding: 8px 20px;
            border-radius: 20px;
        }

        .btn-logout {
            background: #dc143c;
            color: white !important;
            padding: 8px 20px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 90%;
            max-width: 400px;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: black;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
        }

        .checkbox-group input {
            width: auto;
            margin-right: 8px;
        }

        /* Container Utama */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        h2.section-title {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 300;
            font-size: 28px;
            color: #444;
        }

        /* GRID PRODUK (Standard E-Commerce) */
        .product-grid {
            display: grid;
            /* Membuat kolom otomatis responsif, minimal lebar 250px */
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 25px;
        }

        .product-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #eee;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        /* PENTING: Batasan Gambar Standard E-Commerce */
        .product-image-wrapper {
            width: 100%;
            /* Aspect Ratio 1:1 (Persegi) atau 4:5 (Portrait Fashion) */
            aspect-ratio: 1 / 1; 
            background-color: #f0f0f0;
            position: relative;
            overflow: hidden;
        }

        .product-image-wrapper img {
            width: 100%;
            height: 100%;
            /* Object-fit cover memotong gambar agar pas tanpa gepeng */
            object-fit: cover; 
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-image-wrapper img {
            transform: scale(1.05);
        }

        .product-info {
            padding: 15px;
        }

        .product-category {
            font-size: 12px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }

        .product-title {
            font-size: 16px;
            font-weight: 600;
            margin: 0 0 8px 0;
            color: #222;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .product-price {
            font-size: 16px;
            color: #dc143c;
            font-weight: bold;
        }

        .btn-add {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.2s;
            text-decoration: none;
            text-align: center;
        }
        .btn-add:hover {
            background: #dc143c;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="#" class="brand">Stylo<span>Wear</span></a>
    <div class="nav-links">
        @if (Route::has('login'))
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                @else
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            @else
                <a href="#" onclick="openModal()" class="btn-login">Log in</a>
            @endauth
        @endif
    </div>
</nav>

<div class="container">
    <h2 class="section-title">Koleksi Terbaru</h2>

    <div class="product-grid">
        @forelse($products as $product)
            <div class="product-card">
                <!-- Wrapper Gambar dengan batasan rasio -->
                <div class="product-image-wrapper">
                    <!-- Menggunakan asset storage atau placeholder jika tidak ada gambar -->
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/400x400?text=No+Image' }}" 
                         alt="{{ $product->name }}">
                </div>
                
                <div class="product-info">
                    <div class="product-category">{{ $product->category->name ?? 'Fashion' }}</div>
                    <h3 class="product-title" title="{{ $product->name }}">{{ $product->name }}</h3>
                    <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                    
                    <a href="{{ route('product.show', $product->id) }}" class="btn-add">
                        Lihat Detail
                    </a>
                </div>
            </div>
        @empty
            <p style="text-align: center; grid-column: 1/-1; color: #888;">Belum ada produk yang tersedia.</p>
        @endforelse
    </div>
</div>

<!-- Login Modal -->
<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2 style="text-align: center; margin-bottom: 20px;">Login</h2>

        <!-- Session Status -->
        @if (session('status'))
            <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div style="color: #dc3545; font-size: 14px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <div style="color: #dc3545; font-size: 14px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="checkbox-group">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">Remember me</label>
            </div>

            <div style="text-align: center; margin-top: 20px;">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color: #007bff; text-decoration: none; font-size: 14px;">Forgot your password?</a>
                @endif

                <button type="submit" style="background: #dc143c; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px;">
                    Log in
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('loginModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('loginModal').style.display = 'none';
}

// Close modal when clicking outside
window.onclick = function(event) {
    var modal = document.getElementById('loginModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>

</body>
</html>
