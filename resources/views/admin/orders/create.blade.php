@extends('admin.admin')

@section('content')
<h1>Tambah Pesanan</h1>

@if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.orders.store') }}">
    @csrf

    <label>User</label><br>
    <select name="user_id" required>
        <option value="">Pilih User</option>
        @foreach(\App\Models\User::all() as $user)
            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Total</label><br>
    <input type="number" name="total" value="{{ old('total') }}" step="0.01" required>
    <br><br>

    <label>Status</label><br>
    <select name="status" required>
        <option value="">Pilih Status</option>
        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="pemrosesan" {{ old('status') == 'pemrosesan' ? 'selected' : '' }}>Pemrosesan</option>
        <option value="shipping" {{ old('status') == 'shipping' ? 'selected' : '' }}>Shipping</option>
        <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
    </select>
    <br><br>

    <button type="submit">Simpan</button>
</form>
@endsection
