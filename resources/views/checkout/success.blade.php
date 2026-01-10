<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil - StyloWear</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f8f9fa; color: #333; margin: 0; padding: 20px; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .container { max-width: 600px; background: white; padding: 40px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); text-align: center; }
        h1 { color: #28a745; margin-bottom: 20px; }
        p { font-size: 18px; margin-bottom: 30px; }
        .btn-home { text-decoration: none; background: #dc143c; color: white; padding: 12px 30px; border-radius: 5px; font-weight: bold; }
        .btn-home:hover { background: #b01030; }
        .success-icon { font-size: 60px; color: #28a745; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">✓</div>
        <h1>Pembayaran Berhasil!</h1>
        
        @if(isset($order))
            <div style="text-align: left; background: #f9f9f9; padding: 20px; border-radius: 5px; margin-bottom: 30px; border: 1px solid #eee;">
                <h3 style="margin-top: 0; color: #333;">Instruksi Pembayaran</h3>
                <p>Total Tagihan: <strong style="color: #dc143c; font-size: 1.2em;">Rp {{ number_format($order->total, 0, ',', '.') }}</strong></p>
                
                @if($order->payment_method == 'transfer_bca')
                    <p>Silakan transfer ke Bank BCA:<br><strong>123-456-7890</strong><br>a.n StyloWear Official</p>
                @elseif($order->payment_method == 'transfer_mandiri')
                    <p>Silakan transfer ke Bank Mandiri:<br><strong>123-000-456-7890</strong><br>a.n StyloWear Official</p>
                @elseif($order->payment_method == 'transfer_bri')
                    <p>Silakan transfer ke Bank BRI:<br><strong>1234-01-000000-50-0</strong><br>a.n StyloWear Official</p>
                @elseif($order->payment_method == 'cod')
                    <p>Mohon siapkan uang tunai pas saat kurir tiba di lokasi Anda.</p>
                @elseif(str_contains($order->payment_method, 'ewallet'))
                    <p>Silakan transfer ke nomor E-Wallet ({{ strtoupper(str_replace('ewallet_', '', $order->payment_method)) }}):<br><strong>0812-3456-7890</strong><br>a.n StyloWear</p>
                @else
                    <p>Pesanan Anda telah kami terima dan sedang diproses.</p>
                @endif
                
                <p style="font-size: 0.9em; color: #666; margin-top: 15px;">*Silakan lakukan pembayaran dalam 1x24 jam.</p>
            </div>
        @endif

        <a href="{{ url('/') }}" class="btn-home">Kembali ke Beranda</a>
    </div>
</body>
</html>
