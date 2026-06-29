@extends('layouts.app')

@section('title', 'Buat Booking')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-plus-circle text-primary"></i> Buat Booking</h1>
    <a href="{{ route('user.bookings.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('user.bookings.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="service_id" class="form-label">Pilih Layanan <span class="text-danger">*</span></label>
                        <select name="service_id" id="service_id" class="form-select @error('service_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Layanan --</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id', request('service')) == $service->id ? 'selected' : '' }}>
                                    {{ $service->name }} - Rp {{ number_format($service->price, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="booking_date" class="form-label">Tanggal Booking <span class="text-danger">*</span></label>
                        <input type="date" name="booking_date" id="booking_date" 
                               class="form-control @error('booking_date') is-invalid @enderror" 
                               value="{{ old('booking_date') }}" min="{{ date('Y-m-d') }}" required>
                        @error('booking_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="booking_time" class="form-label">Jam Booking <span class="text-danger">*</span></label>
                        <input type="time" name="booking_time" id="booking_time" 
                               class="form-control @error('booking_time') is-invalid @enderror" 
                               value="{{ old('booking_time') }}" required>
                        @error('booking_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat <span class="text-danger">*</span></label>
                        <textarea name="address" id="address" rows="3" 
                                  class="form-control @error('address') is-invalid @enderror" 
                                  required>{{ old('address') }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label">Catatan Tambahan</label>
                        <textarea name="notes" id="notes" rows="2" 
                                  class="form-control @error('notes') is-invalid @enderror">{{ old('notes') }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> Harga akan dihitung berdasarkan layanan yang dipilih.
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Booking
            </button>
            <a href="{{ route('user.bookings.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Batal
            </a>
        </form>
    </div>
</div>
@endsection