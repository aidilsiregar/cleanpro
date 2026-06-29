@extends('layouts.guest')

@section('title', 'Reset Password - CleanPro')
@section('subtitle', 'Buat password baru')

@section('content')
<form method="POST" action="{{ route('password.store') }}">
    @csrf

    <!-- Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Alamat Email</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                   value="{{ old('email', $request->email) }}" required readonly>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- New Password -->
    <div class="mb-3">
        <label for="password" class="form-label">Password Baru</label>
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
        <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" name="password_confirmation" id="password_confirmation" 
                   class="form-control" placeholder="Ulangi password baru" required>
            <button type="button" class="btn-toggle-password">
                <i class="fas fa-eye"></i>
            </button>
        </div>
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-primary w-100">
        <i class="fas fa-save me-2"></i> Reset Password
    </button>
</form>
@endsection