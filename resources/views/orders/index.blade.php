<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Belanja - StyloWear</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f8f9fa; margin: 0; color: #333; }
        .navbar { background: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .brand { font-size: 24px; font-weight: bold; color: #333; text-decoration: none; }
        .brand span { color: #dc143c; }
        .container { max-width: 1000px; margin: 40px auto; padding: 0 20px; }
        .card { background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); padding: 20px; margin-bottom: 20px; }
        h1 { margin-top: 0; font-weight: 300; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background-color: #f9f9f9; font-weight: 600; color: #555; }
        
        .status-badge { padding: 5px 10px; border-radius: 15px; font-size: 12px; font-weight: bold; text-transform: uppercase; }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-processing { background: #cce5ff; color: #004085; }
        .status-shipped { background: #d1ecf1; color: #0c5460; }
        .status-delivered, .status-completed { background: #d4edda; color: #155724; }
        .status-cancelled { background: #f8d7da; color: #721c24; }

        .btn-view { background: #333; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; font-size: 14px; }
        .btn-view:hover { background: #dc143c; }
        .btn-back { text-decoration: none; color: #555; display: inline-block; margin-bottom: 20px; }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="{{ url('/') }}" class="brand">Stylo<span>Wear</span></a>
    <div>
        <a href="{{ url('/') }}" style="text-decoration: none; color: #333;">Kembali ke Toko</a>
    </div>
</nav>

<div class="container">
    <a href="{{ url('/') }}" class="btn-back">← Kembali Belanja</a>
    
    <div class="card">
        <h1>Riwayat Belanja Saya</h1>

        @if($orders->isEmpty())
            <p style="text-align: center; padding: 40px; color: #888;">Anda belum memiliki riwayat belanja.</p>
            <div style="text-align: center;">
                <a href="{{ url('/') }}" class="btn-view">Mulai Belanja</a>
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                        <td style="font-weight: bold;">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                        <td>
                            <span class="status-badge status-{{ strtolower($order->status) }}">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn-view">Lihat Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="margin-top: 20px;">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
</div>

</body>
</html>
