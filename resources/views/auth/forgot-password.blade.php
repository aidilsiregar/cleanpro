@extends('layouts.guest')

@section('title', 'Lupa Password - CleanPro')
@section('subtitle', 'Reset password Anda')

@section('content')
<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i> 
        Masukkan email Anda, kami akan mengirimkan link untuk reset password.
    </div>

    <!-- Email -->
    <div class="mb-4">
        <label for="email" class="form-label">Alamat Email</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                   value="{{ old('email') }}" placeholder="contoh@email.com" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-primary w-100">
        <i class="fas fa-paper-plane me-2"></i> Kirim Link Reset Password
    </button>

    <!-- Back to Login -->
    <div class="text-center mt-3">
        <a href="{{ route('login') }}" class="auth-link">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Login
        </a>
    </div>
</form>
@endsection