<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - StyloWear</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f8f9fa; color: #333; margin: 0; padding: 20px; }
        .container { max-width: 1000px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        h1 { margin-bottom: 20px; color: #dc143c; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background-color: #f8f9fa; }
        .total-section { text-align: right; font-size: 20px; font-weight: bold; margin-top: 20px; }
        .checkout-form { margin-top: 30px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        select, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
        .btn-submit { background: #dc143c; color: white; padding: 12px 30px; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; }
        .btn-submit:hover { background: #b01030; }
        .btn-back { text-decoration: none; color: #555; padding: 10px 20px; border: 1px solid #ddd; border-radius: 5px; margin-right: 10px; }
        .alert { padding: 10px; background: #d4edda; color: #155724; border-radius: 5px; margin-bottom: 20px; }
        .error { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Checkout</h1>

        @if(session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif

        <h2>Ringkasan Keranjang</h2>
        <table>
            <thead>
                <tr>
                    <th style="width: 50%">Produk</th>
                    <th style="width: 15%">Harga</th>
                    <th style="width: 15%">Jumlah</th>
                    <th style="width: 20%">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $details)
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
                        <td>{{ $details['quantity'] }}</td>
                        <td>Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total-section">
            Total: Rp {{ number_format($total, 0, ',', '.') }}
        </div>

        <div class="checkout-form">
            <h2>Detail Pembayaran</h2>
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Penerima</label>
                    <input type="text" value="{{ Auth::user()->name }}" readonly style="background-color: #e9ecef; cursor: not-allowed;">
                </div>
                <div class="form-group">
                    <label for="payment_method">Metode Pembayaran</label>
                    <select name="payment_method" id="payment_method" required>
                        <option value="">Pilih Metode Pembayaran</option>
                        <optgroup label="Transfer Bank">
                            <option value="transfer_bca">Bank BCA</option>
                            <option value="transfer_mandiri">Bank Mandiri</option>
                            <option value="transfer_bri">Bank BRI</option>
                        </optgroup>
                        <optgroup label="E-Wallet">
                            <option value="ewallet_gopay">GoPay</option>
                            <option value="ewallet_ovo">OVO</option>
                            <option value="ewallet_dana">DANA</option>
                        </optgroup>
                        <option value="cod">Cash on Delivery (COD)</option>
                        <option value="credit_card">Kartu Kredit</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Alamat Pengiriman</label>
                    <textarea name="address" id="address" rows="4" placeholder="Masukkan alamat lengkap pengiriman" required>{{ old('address', Auth::user()->address) }}</textarea>
                </div>
                <div style="margin-top: 20px;">
                    <a href="{{ route('cart.index') }}" class="btn-back">← Kembali ke Keranjang</a>
                    <button type="submit" class="btn-submit">Proses Pembayaran</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
