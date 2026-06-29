@extends('layouts.guest')

@section('title', 'Register - CleanPro')
@section('subtitle', 'Buat akun baru')

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name') }}" placeholder="John Doe" required autofocus>
        </div>
        @error('name')
            <div class="text-danger mt-1 small">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Alamat Email</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                   value="{{ old('email') }}" placeholder="email@example.com" required>
        </div>
        @error('email')
            <div class="text-danger mt-1 small">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Nomor Telepon</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-phone"></i></span>
            <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" 
                   value="{{ old('phone') }}" placeholder="08123456789">
        </div>
        @error('phone')
            <div class="text-danger mt-1 small">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" 
                   value="{{ old('address') }}" placeholder="Jl. Contoh No. 123, Jakarta">
        </div>
        @error('address')
            <div class="text-danger mt-1 small">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" 
                   placeholder="Minimal 8 karakter" required>
        </div>
        @error('password')
            <div class="text-danger mt-1 small">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" name="password_confirmation" id="password_confirmation" 
                   class="form-control" placeholder="Ulangi password" required>
        </div>
    </div>

    <button type="submit" class="btn btn-primary w-100">
        <i class="fas fa-user-plus"></i> Daftar
    </button>

    <div class="divider">
        <span>atau</span>
    </div>

    <div class="text-center">
        <p class="mb-0">Sudah punya akun? <a href="{{ route('login') }}">Masuk Sekarang</a></p>
    </div>
</form>
@endsection