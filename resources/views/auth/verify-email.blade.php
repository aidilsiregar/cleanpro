@extends('layouts.guest')

@section('title', 'Verifikasi Email - CleanPro')
@section('subtitle', 'Verifikasi alamat email Anda')

@section('content')
<div class="text-center">
    <div class="mb-4">
        <i class="fas fa-envelope-open-text" style="font-size: 60px; color: #667eea;"></i>
    </div>

    <p class="text-muted">
        Terima kasih telah mendaftar! Sebelum memulai, mohon verifikasi alamat email Anda dengan 
        mengklik link yang telah kami kirimkan ke email Anda.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> Link verifikasi baru telah dikirim ke email Anda.
        </div>
    @endif

    <div class="mt-4">
        <form method="POST" action="{{ route('verification.send') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> Kirim Ulang Verifikasi
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-secondary">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</div>
@endsection