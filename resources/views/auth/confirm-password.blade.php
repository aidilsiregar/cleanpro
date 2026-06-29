@extends('layouts.guest')

@section('title', 'Konfirmasi Password - CleanPro')
@section('subtitle', 'Konfirmasi password untuk melanjutkan')

@section('content')
<form method="POST" action="{{ route('password.confirm') }}">
    @csrf

    <div class="alert alert-warning">
        <i class="fas fa-exclamation-triangle me-2"></i> 
        Ini adalah area aman. Harap konfirmasi password Anda sebelum melanjutkan.
    </div>

    <!-- Password -->
    <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" 
                   placeholder="Masukkan password Anda" required>
            <button type="button" class="btn-toggle-password">
                <i class="fas fa-eye"></i>
            </button>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-primary w-100">
        <i class="fas fa-check me-2"></i> Konfirmasi
    </button>
</form>
@endsection