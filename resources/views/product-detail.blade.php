<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - StyloWear</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .navbar {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .brand { font-size: 24px; font-weight: bold; color: #333; text-decoration: none; }
        .brand span { color: #dc143c; }
        .btn-back { text-decoration: none; color: #555; font-weight: 500; }
        .btn-back:hover { color: #dc143c; }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .product-detail-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            overflow: hidden;
            display: flex;
            flex-wrap: wrap;
        }

        .product-image {
            flex: 1;
            min-width: 300px;
            background: #f0f0f0;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            min-height: 400px;
        }

        .product-info {
            flex: 1;
            padding: 40px;
            min-width: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .category {
            color: #888;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        h1 { margin: 0 0 15px 0; font-size: 32px; color: #222; }

        .price {
            font-size: 28px;
            color: #dc143c;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .description {
            line-height: 1.6;
            color: #555;
            margin-bottom: 30px;
        }

        .btn-buy {
            background: #dc143c;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            width: fit-content;
        }
        .btn-buy:hover { background: #b01030; }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="{{ url('/') }}" class="brand">Stylo<span>Wear</span></a>
        <a href="{{ url('/') }}" class="btn-back">← Kembali ke Toko</a>
    </nav>

    <div class="container">
        <div class="product-detail-card">
            <div class="product-image">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/500' }}" alt="{{ $product->name }}">
            </div>
            <div class="product-info">
                <div class="category">{{ $product->category->name ?? 'Fashion' }}</div>
                <h1>{{ $product->name }}</h1>
                <div class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                <p class="description">{{ $product->description }}</p>
                
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <div style="margin-bottom: 15px; display: flex; align-items: center;">
                        <label for="quantity" style="margin-right: 10px; font-weight: bold;">Jumlah:</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" style="width: 60px; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
                    </div>
                    <button type="submit" class="btn-buy">Tambah ke Keranjang</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>