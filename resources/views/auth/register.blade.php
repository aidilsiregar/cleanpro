@extends('layouts.guest')

@section('title', 'Register - CleanPro')
@section('subtitle', 'Buat akun baru')

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name') }}" placeholder="John Doe" required autofocus>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Alamat Email</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                   value="{{ old('email') }}" placeholder="contoh@email.com" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Phone -->
    <div class="mb-3">
        <label for="phone" class="form-label">Nomor Telepon</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-phone"></i></span>
            <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" 
                   value="{{ old('phone') }}" placeholder="08123456789">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Address -->
    <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" 
                   value="{{ old('address') }}" placeholder="Jl. Contoh No. 123, Jakarta">
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" 
                   placeholder="Minimal 8 karakter" required>
            <button type="button" class="btn-toggle-password">
                <i class="fas fa-eye"></i>
            </button>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <small class="form-text">Password harus minimal 8 karakter.</small>
    </div>

    <!-- Confirm Password -->
    <div class="mb-4">
        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" name="password_confirmation" id="password_confirmation" 
                   class="form-control" placeholder="Ulangi password" required>
            <button type="button" class="btn-toggle-password">
                <i class="fas fa-eye"></i>
            </button>
        </div>
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-primary w-100">
        <i class="fas fa-user-plus me-2"></i> Daftar
    </button>

    <!-- Divider -->
    <div class="divider">
        <span>atau</span>
    </div>

    <!-- Social Register -->
    <div class="d-grid gap-2">
        <button type="button" class="btn-social">
            <i class="fab fa-google" style="color: #db4437;"></i> Daftar dengan Google
        </button>
        <button type="button" class="btn-social">
            <i class="fab fa-facebook" style="color: #4267B2;"></i> Daftar dengan Facebook
        </button>
    </div>

    <!-- Login Link -->
    <div class="text-center mt-4">
        <p class="mb-0" style="color: #4a5568;">
            Sudah punya akun? <a href="{{ route('login') }}" class="auth-link">Masuk Sekarang</a>
        </p>
    </div>
</form>
@endsection