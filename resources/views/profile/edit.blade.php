<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - StyloWear</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f8f9fa; margin: 0; color: #333; }
        .navbar { background: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .brand { font-size: 24px; font-weight: bold; color: #333; text-decoration: none; }
        .brand span { color: #dc143c; }
        .container { max-width: 800px; margin: 40px auto; padding: 0 20px; }
        .card { background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); padding: 30px; margin-bottom: 20px; }
        h2 { margin-top: 0; font-size: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 20px; color: #333; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #555; }
        .form-group input { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; box-sizing: border-box; }
        .form-group input:focus { border-color: #dc143c; outline: none; }
        .btn { padding: 10px 20px; border-radius: 5px; cursor: pointer; font-size: 14px; font-weight: 600; border: none; transition: background 0.3s; }
        .btn-primary { background: #dc143c; color: white; }
        .btn-primary:hover { background: #b01030; }
        .btn-danger { background: #dc3545; color: white; }
        .btn-danger:hover { background: #a71d2a; }
        .btn-back { text-decoration: none; color: #555; display: inline-block; margin-bottom: 20px; font-weight: 500; }
        .btn-back:hover { color: #dc143c; }
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 5px; font-size: 14px; }
        .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .text-danger { color: #dc3545; font-size: 13px; margin-top: 5px; }
        .text-muted { color: #777; font-size: 13px; margin-bottom: 15px; }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ url('/') }}" class="brand">Stylo<span>Wear</span></a>
        <a href="{{ url('/') }}" style="text-decoration: none; color: #333; font-weight: 500;">Kembali ke Toko</a>
    </nav>

    <div class="container">
        <a href="{{ url('/') }}" class="btn-back">← Kembali</a>

        @if (session('status') === 'profile-updated')
            <div class="alert alert-success">
                Profil berhasil diperbarui.
            </div>
        @endif

        <!-- Update Profile Information -->
        <div class="card">
            <h2>Informasi Profil</h2>
            <p class="text-muted">Perbarui informasi profil akun dan alamat email Anda.</p>
            
            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Nomor Telepon</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Alamat Lengkap</label>
                    <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}">
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="city">Kota</label>
                    <input type="text" id="city" name="city" value="{{ old('city', $user->city) }}">
                    @error('city')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="country">Negara</label>
                    <input type="text" id="country" name="country" value="{{ old('country', $user->country) }}">
                    @error('country')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="postal_code">Kode Pos</label>
                    <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}">
                    @error('postal_code')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>

        <!-- Update Password -->
        <div class="card">
            <h2>Perbarui Password</h2>
            <p class="text-muted">Pastikan akun Anda menggunakan password yang panjang dan acak agar tetap aman.</p>

            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="current_password">Password Saat Ini</label>
                    <input type="password" id="current_password" name="current_password" autocomplete="current-password">
                    @error('current_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" id="password" name="password" autocomplete="new-password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password Baru</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan Password</button>

                @if (session('status') === 'password-updated')
                    <p style="color: green; margin-top: 10px; font-size: 14px;">Password berhasil disimpan.</p>
                @endif
            </form>
        </div>

        <!-- Delete Account -->
        <div class="card">
            <h2 style="color: #dc3545;">Hapus Akun</h2>
            <p class="text-muted">Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen.</p>

            <form method="post" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini secara permanen?');">
                @csrf
                @method('delete')

                <div class="form-group">
                    <label for="password_delete" style="font-weight: normal;">Masukkan password Anda untuk konfirmasi:</label>
                    <input type="password" id="password_delete" name="password" placeholder="Password">
                    @error('password', 'userDeletion')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-danger">Hapus Akun</button>
            </form>
        </div>
    </div>

</body>
</html>