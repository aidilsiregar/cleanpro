@extends('layouts.guest')

@section('title', 'Login - CleanPro')
@section('subtitle', 'Masuk ke akun Anda')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email -->
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

    <!-- Password -->
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

    <!-- Remember & Forgot -->
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

    <!-- Submit -->
    <div class="btn-submit">
        <button type="submit" class="btn btn-primary w-100">
            <i class="fas fa-sign-in-alt me-2"></i> Masuk
        </button>
    </div>

    <!-- Divider -->
    <div class="divider-auth">
        <div class="divider">
            <span>atau</span>
        </div>
    </div>

    <!-- Social Login -->
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

    <!-- Register Link -->
    <div class="auth-link-bottom text-center mt-4">
        <p class="mb-0" style="color: #4a5568;">
            Belum punya akun? <a href="{{ route('register') }}" class="auth-link">Daftar Sekarang</a>
        </p>
    </div>

    <!-- Demo Credentials -->
    <div class="demo-credentials">
        <p class="mb-2"><strong><i class="fas fa-info-circle"></i> Akun Demo</strong></p>
        <div class="cred-item">
            <span>Admin:</span>
            <span>admin@cleanpro.com / password</span>
        </div>
        <div class="cred-item">
            <span>Petugas:</span>
            <span>petugas@cleanpro.com / password</span>
        </div>
        <div class="cred-item">
            <span>User:</span>
            <span>user@cleanpro.com / password</span>
        </div>
    </div>
</form>
@endsection