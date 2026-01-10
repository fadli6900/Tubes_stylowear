<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil - StyloWear</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f8f9fa; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 40px; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); text-align: center; max-width: 400px; }
        .icon { font-size: 60px; color: #28a745; margin-bottom: 20px; }
        h2 { margin: 0 0 10px 0; color: #333; }
        p { color: #666; margin-bottom: 30px; }
        .btn { display: block; width: 100%; padding: 12px; border-radius: 5px; text-decoration: none; font-weight: bold; margin-bottom: 10px; box-sizing: border-box; }
        .btn-primary { background: #dc143c; color: white; }
        .btn-secondary { background: #eee; color: #333; }
    </style>
</head>
<body>
    <div class="card">
        <div class="icon">✓</div>
        <h2>Pembayaran Berhasil!</h2>
        <p>Terima kasih telah berbelanja. Pesanan Anda telah kami terima dan sedang diproses.</p>
        
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Lihat Pesanan Saya</a>
        <a href="{{ url('/') }}" class="btn btn-secondary">Kembali Belanja</a>
    </div>
</body>
</html>