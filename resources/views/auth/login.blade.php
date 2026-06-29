@extends('layouts.guest')

@section('title', 'Login - CleanPro')
@section('subtitle', 'Masuk ke akun Anda')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label">Alamat Email</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                   value="{{ old('email') }}" placeholder="admin@cleanpro.com" required autofocus>
        </div>
        @error('email')
            <div class="text-danger mt-1 small">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" 
                   placeholder="••••••••" required>
        </div>
        @error('password')
            <div class="text-danger mt-1 small">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="form-check">
            <input type="checkbox" name="remember" id="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember" class="form-check-label">Ingat Saya</label>
        </div>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="small">Lupa Password?</a>
        @endif
    </div>

    <button type="submit" class="btn btn-primary w-100">
        <i class="fas fa-sign-in-alt"></i> Masuk
    </button>

    <div class="divider">
        <span>atau</span>
    </div>

    <div class="text-center">
        <p class="mb-0">Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a></p>
    </div>

    <div class="mt-3 text-center">
        <small class="text-muted">
            <i class="fas fa-info-circle"></i> Akun Demo: <br>
            <strong>admin@cleanpro.com</strong> / password <br>
            <strong>petugas@cleanpro.com</strong> / password <br>
            <strong>user@cleanpro.com</strong> / password
        </small>
    </div>
</form>
@endsection