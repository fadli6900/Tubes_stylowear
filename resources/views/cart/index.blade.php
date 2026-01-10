<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - StyloWear</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f8f9fa; color: #333; margin: 0; padding: 20px; }
        .container { max-width: 1000px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        h1 { margin-bottom: 20px; color: #dc143c; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background-color: #f8f9fa; }
        .btn-update { background: #333; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; }
        .btn-remove { color: #dc143c; text-decoration: none; font-weight: bold; }
        .total-section { text-align: right; font-size: 20px; font-weight: bold; margin-top: 20px; }
        .actions { display: flex; justify-content: space-between; margin-top: 30px; }
        .btn-continue { text-decoration: none; color: #555; padding: 10px 20px; border: 1px solid #ddd; border-radius: 5px; }
        .btn-checkout { text-decoration: none; background: #dc143c; color: white; padding: 12px 30px; border-radius: 5px; font-weight: bold; }
        .btn-checkout:hover { background: #b01030; }
        .alert { padding: 10px; background: #d4edda; color: #155724; border-radius: 5px; margin-bottom: 20px; }
        input[type="number"] { width: 60px; padding: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Keranjang Belanja</h1>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert" style="background: #f8d7da; color: #721c24;">{{ session('error') }}</div>
        @endif

        @if(session('cart'))
            <table>
                <thead>
                    <tr>
                        <th style="width: 50%">Produk</th>
                        <th style="width: 15%">Harga</th>
                        <th style="width: 15%">Jumlah</th>
                        <th style="width: 20%">Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity']; @endphp
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center;">
                                    @if(isset($details['image']))
                                        <img src="{{ asset('storage/' . $details['image']) }}" width="50" height="50" style="object-fit: cover; margin-right: 10px; border-radius: 5px;">
                                    @endif
                                    {{ $details['name'] }}
                                </div>
                            </td>
                            <td>Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.update') }}" method="POST" style="display: flex; gap: 5px;">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                                    <button type="submit" class="btn-update">↻</button>
                                </form>
                            </td>
                            <td>Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-remove" style="background:none; border:none; cursor:pointer;">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="total-section">
                Total: Rp {{ number_format($total, 0, ',', '.') }}
            </div>

            <div class="actions">
                <a href="{{ url('/') }}" class="btn-continue">← Lanjut Belanja</a>
                <a href="{{ route('checkout.index') }}" class="btn-checkout">Checkout Sekarang</a>
            </div>
        @else
            <div style="text-align: center; padding: 50px;">
                <h3>Keranjang Anda kosong</h3>
                <a href="{{ url('/') }}" class="btn-continue" style="margin-top: 20px; display: inline-block;">Mulai Belanja</a>
            </div>
        @endif
    </div>
</body>
</html>