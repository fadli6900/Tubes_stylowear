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

        /* Modern Search Bar Styles */
        .search-wrapper {
            position: relative;
            max-width: 700px;
            margin: 0 auto 40px;
            z-index: 50;
        }

        .search-box {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 50px;
            padding: 5px 5px 5px 25px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border: 1px solid #eee;
            transition: all 0.3s ease;
        }

        .search-box:focus-within {
            box-shadow: 0 8px 30px rgba(220, 20, 60, 0.15);
            border-color: rgba(220, 20, 60, 0.2);
            transform: translateY(-2px);
        }

        .search-select {
            border: none;
            background: transparent;
            font-size: 14px;
            color: #555;
            outline: none;
            cursor: pointer;
            padding-right: 15px;
            border-right: 1px solid #eee;
            margin-right: 15px;
            font-weight: 500;
        }

        .search-input {
            flex: 1;
            border: none;
            outline: none;
            font-size: 16px;
            color: #333;
            background: transparent;
            padding: 10px 0;
        }

        .search-btn-submit {
            background: #dc143c;
            color: white;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s;
            margin-left: 10px;
        }

        .search-btn-submit:hover {
            background: #b01030;
        }

        /* Suggestions Dropdown */
        .suggestions-dropdown {
            position: absolute;
            top: 100%;
            left: 20px;
            right: 20px;
            background: white;
            border-radius: 15px;
            margin-top: 10px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.12);
            overflow: hidden;
            display: none;
            border: 1px solid #f0f0f0;
        }

        .suggestion-item {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            text-decoration: none;
            transition: background 0.2s;
            border-bottom: 1px solid #f9f9f9;
        }

        .suggestion-item:last-child { border-bottom: none; }
        .suggestion-item:hover { background: #f8f9fa; }

        .suggestion-thumb {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            object-fit: cover;
            margin-right: 15px;
            background: #eee;
        }

        .suggestion-details h4 {
            margin: 0;
            font-size: 14px;
            color: #333;
            font-weight: 600;
        }

        .suggestion-details span {
            font-size: 12px;
            color: #dc143c;
            font-weight: bold;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="#" class="brand">Stylo<span>Wear</span></a>
    
    <!-- Navbar Logic -->
    <div class="flex items-center gap-4" style="display: flex; align-items: center; gap: 15px;">
        <!-- Link Keranjang -->
        <a href="{{ route('cart.index') }}" style="text-decoration: none; color: #333; font-weight: 500; display: flex; align-items: center; margin-right: 10px;">
            Keranjang
            @if(session('cart'))
                <span style="background: #dc143c; color: white; border-radius: 50%; padding: 2px 6px; font-size: 12px; margin-left: 5px;">
                    {{ count(session('cart')) }}
                </span>
            @endif
        </a>

    @if (Route::has('login'))
        @auth
            <!-- Tampilan jika user SUDAH Login -->
            <div class="flex items-center gap-4">
                <span style="margin-right: 10px; color: #555;">
                    Halo, {{ Auth::user()->name }}
                </span>

                <a href="{{ route('orders.index') }}" style="color: #333; text-decoration: none; margin-right: 10px; font-weight: 500;">
                    Riwayat Belanja
                </a>
                
                @if(Auth::user()->role === 'admin')
                     <a href="{{ route('admin.dashboard') }}" style="color: #dc143c; text-decoration: none; margin-right: 10px; font-weight: 600;">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('profile.edit') }}" style="color: #dc143c; text-decoration: none; margin-right: 10px; font-weight: 600;">
                        Profil
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-logout">
                        Keluar
                    </button>
                </form>
            </div>
        @else
            <!-- Tampilan jika user BELUM Login (Tamu) -->
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="btn-login" style="background: transparent; color: #333 !important; border: 1px solid #ccc;">
                    Masuk
                </a>
                <a href="{{ route('register') }}" class="btn-login">
                    Daftar
                </a>
            </div>
        @endauth
    @endif
</div>
</nav>

<div class="container">
    <!-- Search Bar & Filter Kategori -->
    <div class="search-wrapper">
        <form action="{{ url('/') }}" method="GET" class="search-box">
            
            <!-- Dropdown Kategori -->
            <select name="category_id" class="search-select">
                <option value="">Semua Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <!-- Input Pencarian -->
            <input type="text" name="search" id="searchInput" class="search-input" placeholder="Cari produk impianmu..." value="{{ request('search') }}" autocomplete="off">

            <!-- Tombol Cari -->
            <button type="submit" class="search-btn-submit">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>
        </form>
        
        <!-- Suggestions Container -->
        <div id="suggestionsBox" class="suggestions-dropdown"></div>
    </div>

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
                    <div class="product-category">{{ optional($product->category)->name ?? 'Fashion' }}</div>
                    <h3 class="product-title" title="{{ $product->name }}">{{ $product->name }}</h3>
                    <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                    
                    <a href="{{ route('product.show', $product->id) }}" class="btn-add">
                        Lihat Detail
                    </a>
                </div>
            </div>
        @empty
            @if(request('search') || request('category_id'))
                <p style="text-align: center; grid-column: 1/-1; color: #888; padding: 40px 0;">Tidak ada produk yang cocok dengan pencarian Anda.</p>
            @else
                <p style="text-align: center; grid-column: 1/-1; color: #888; padding: 40px 0;">Belum ada produk yang tersedia saat ini.</p>
            @endif
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

// Search Suggestions Logic
const searchInput = document.getElementById('searchInput');
const suggestionsBox = document.getElementById('suggestionsBox');
let timeout = null;

searchInput.addEventListener('input', function() {
    clearTimeout(timeout);
    const query = this.value;

    if(query.length < 2) {
        suggestionsBox.style.display = 'none';
        return;
    }

    // Debounce untuk mengurangi request
    timeout = setTimeout(() => {
        fetch(`{{ route('products.search.suggestions') }}?query=${query}`)
            .then(response => response.json())
            .then(data => {
                if(data.length > 0) {
                    suggestionsBox.innerHTML = '';
                    data.forEach(product => {
                        const imgUrl = product.image ? `{{ asset('storage') }}/${product.image}` : 'https://via.placeholder.com/40';
                        const price = new Intl.NumberFormat('id-ID').format(product.price);
                        const item = `
                            <a href="/product/${product.id}" class="suggestion-item">
                                <img src="${imgUrl}" class="suggestion-thumb" alt="${product.name}">
                                <div class="suggestion-details">
                                    <h4>${product.name}</h4>
                                    <span>Rp ${price}</span>
                                </div>
                            </a>
                        `;
                        suggestionsBox.innerHTML += item;
                    });
                    suggestionsBox.style.display = 'block';
                } else {
                    suggestionsBox.style.display = 'none';
                }
            });
    }, 300);
});

// Close suggestions when clicking outside
document.addEventListener('click', function(e) {
    if (!searchInput.contains(e.target) && !suggestionsBox.contains(e.target)) {
        suggestionsBox.style.display = 'none';
    }
});
</script>

</body>
</html>
