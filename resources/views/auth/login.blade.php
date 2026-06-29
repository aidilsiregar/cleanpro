@extends('layouts.guest')

@section('title', 'Login - CleanPro')
@section('subtitle', 'Masuk ke akun Anda')

@section('content')
<style>
    /* 1. Aktifkan scrollbar HANYA di bagian paling kanan layar browser */
    html {
        overflow-y: scroll !important;
        height: auto !important;
    }
    body {
        overflow-y: visible !important;
        height: auto !important;
        min-height: 100vh !important;
    }
    
    /* 2. Paksa semua container layout agar tingginya fleksibel */
    .min-vh-100, .vh-100, [class*="wrapper"], [class*="container"] {
        height: auto !important;
        min-height: 100vh !important;
        padding-top: 2rem !important;
        padding-bottom: 2rem !important;
    }

    /* 3. MATIKAN paksa semua scrollbar gaib yang muncul di tengah-tengah form */
    * {
        /* Kecuali html dan body, semua elemen tidak boleh bikin scrollbar sendiri */
        scrollbar-width: none !important; /* Untuk Firefox */
    }
    *::-webkit-scrollbar {
        display: none !important; /* Untuk Chrome, Safari, dan Edge */
    }
</style>
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group mb-3">
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

    <div class="form-group mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" 
                   placeholder="Masukkan password" required>
            <button type="button" class="btn-toggle-password">
                <i class="fas fa-eye"></i>
            </button>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group d-flex justify-content-between align-items-center mb-4">
        <div class="form-check">
            <input type="checkbox" name="remember" id="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember" class="form-check-label">Ingat Saya</label>
        </div>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="auth-link" style="font-size: 0.9rem;">
                Lupa Password?
            </a>
        @endif
    </div>

    <div class="btn-submit">
        <button type="submit" class="btn btn-primary w-100">
            <i class="fas fa-sign-in-alt me-2"></i> Masuk
        </button>
    </div>

    <div class="divider-auth">
        <div class="divider">
            <span>atau</span>
        </div>
    </div>

    <div class="social-login">
        <div class="d-grid gap-2">
            <button type="button" class="btn-social">
                <i class="fab fa-google" style="color: #db4437;"></i> Login dengan Google
            </button>
            <button type="button" class="btn-social">
                <i class="fab fa-facebook" style="color: #4267B2;"></i> Login dengan Facebook
            </button>
        </div>
    </div>

    <div class="auth-link-bottom text-center mt-4">
        <p class="mb-0" style="color: #4a5568;">
            Belum punya akun? <a href="{{ route('register') }}" class="auth-link">Daftar Sekarang</a>
        </p>
    </div>

</form>
@endsection