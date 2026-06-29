@extends('layouts.guest')

@section('title', 'Verifikasi Email - CleanPro')
@section('subtitle', 'Verifikasi alamat email Anda')

@section('content')
<div class="text-center">
    <!-- Icon -->
    <div class="mb-4">
        <div style="display: inline-flex; align-items: center; justify-content: center; width: 80px; height: 80px; border-radius: 50%; background: rgba(102, 126, 234, 0.1);">
            <i class="fas fa-envelope-open-text" style="font-size: 36px; color: #667eea;"></i>
        </div>
    </div>

    <h5 style="font-weight: 700; color: #1a202c;">Verifikasi Email Anda</h5>
    
    <p style="color: #4a5568; font-size: 0.95rem; max-width: 400px; margin: 12px auto;">
        Terima kasih telah mendaftar! Sebelum memulai, mohon verifikasi alamat email Anda 
        dengan mengklik link yang telah kami kirimkan ke email Anda.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            <i class="fas fa-check-circle me-2"></i> Link verifikasi baru telah dikirim ke email Anda.
        </div>
    @endif

    <!-- Actions -->
    <div class="d-grid gap-3 mt-4" style="max-width: 300px; margin: 0 auto;">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-paper-plane me-2"></i> Kirim Ulang Verifikasi
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-secondary w-100" style="border-radius: 12px; padding: 12px; font-weight: 600;">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </button>
        </form>
    </div>
</div>
@endsection