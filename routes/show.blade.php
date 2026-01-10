<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan #{{ $order->id }} - StyloWear</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f8f9fa; margin: 0; color: #333; }
        .navbar { background: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .brand { font-size: 24px; font-weight: bold; color: #333; text-decoration: none; }
        .brand span { color: #dc143c; }
        .container { max-width: 800px; margin: 40px auto; padding: 0 20px; }
        .card { background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); padding: 30px; margin-bottom: 20px; }
        
        .order-header { display: flex; justify-content: space-between; border-bottom: 1px solid #eee; padding-bottom: 20px; margin-bottom: 20px; }
        .order-meta div { margin-bottom: 5px; color: #555; }
        
        .item-list { list-style: none; padding: 0; }
        .item { display: flex; justify-content: space-between; align-items: center; padding: 15px 0; border-bottom: 1px solid #f5f5f5; }
        .item-info { display: flex; align-items: center; gap: 15px; }
        .item-image { width: 60px; height: 60px; background: #eee; border-radius: 5px; object-fit: cover; }
        
        .total-section { margin-top: 20px; text-align: right; font-size: 18px; font-weight: bold; color: #dc143c; }
        .btn-back { text-decoration: none; color: #555; display: inline-block; margin-bottom: 20px; }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="{{ url('/') }}" class="brand">Stylo<span>Wear</span></a>
</nav>

<div class="container">
    <a href="{{ route('orders.index') }}" class="btn-back">← Kembali ke Riwayat</a>

    <div class="card">
        <div class="order-header">
            <div>
                <h2 style="margin: 0;">Pesanan #{{ $order->id }}</h2>
                <span style="font-size: 14px; color: #888;">{{ $order->created_at->format('d F Y, H:i') }}</span>
            </div>
            <div style="text-align: right;">
                <div style="font-weight: bold; text-transform: uppercase; color: #dc143c;">{{ $order->status }}</div>
            </div>
        </div>

        <div style="margin-bottom: 30px;">
            <h3 style="font-size: 16px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Item Pesanan</h3>
            <ul class="item-list">
                @foreach($order->items as $item)
                <li class="item">
                    <div class="item-info">
                        <!-- Gambar Produk (Placeholder jika null) -->
                        <img src="{{ $item->product && $item->product->image ? asset('storage/' . $item->product->image) : 'https://via.placeholder.com/60' }}" 
                             class="item-image" alt="{{ $item->product->name ?? 'Produk dihapus' }}">
                        
                        <div>
                            <div style="font-weight: 600;">{{ $item->product->name ?? 'Produk tidak tersedia' }}</div>
                            <div style="font-size: 13px; color: #888;">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                        </div>
                    </div>
                    <div style="font-weight: 600;">
                        Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="total-section">
            Total Bayar: Rp {{ number_format($order->total, 0, ',', '.') }}
        </div>
    </div>
</div>

</body>
</html>