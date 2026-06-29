@extends('layouts.app')

@section('title', 'Detail Booking - ' . $booking->booking_code)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-file-invoice text-primary"></i> Detail Booking</h1>
    <div>
        <a href="{{ route('user.bookings.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Informasi Booking</h5>
                <span class="badge bg-{{ $booking->status_badge }} fs-6">
                    {{ $booking->status_text }}
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Kode Booking:</strong> {{ $booking->booking_code }}</p>
                        <p><strong>Layanan:</strong> {{ $booking->service->name }}</p>
                        <p><strong>Tanggal:</strong> {{ $booking->booking_date->format('d M Y') }}</p>
                        <p><strong>Jam:</strong> {{ $booking->booking_time }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Total Harga:</strong> <strong class="text-primary">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</strong></p>
                        <p><strong>Alamat:</strong> {{ $booking->address }}</p>
                        @if($booking->notes)
                            <p><strong>Catatan:</strong> {{ $booking->notes }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if($booking->petugas)
            <div class="card mt-3">
                <div class="card-header">
                    <h5><i class="fas fa-user-tie"></i> Petugas</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-circle me-3">
                            {{ substr($booking->petugas->name, 0, 1) }}
                        </div>
                        <div>
                            <h6 class="mb-0">{{ $booking->petugas->name }}</h6>
                            <small class="text-muted">ID: {{ $booking->petugas->employee_id }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($booking->status == 'completed')
            <div class="card mt-3">
                <div class="card-header">
                    <h5><i class="fas fa-star text-warning"></i> Beri Ulasan</h5>
                </div>
                <div class="card-body">
                    @if($booking->review)
                        <div class="alert alert-success">
                            <p><strong>Rating:</strong> 
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $booking->review->rating)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star text-warning"></i>
                                    @endif
                                @endfor
                            </p>
                            <p><strong>Komentar:</strong> {{ $booking->review->comment }}</p>
                        </div>
                    @else
                        <form action="{{ route('user.reviews.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                            <div class="mb-3">
                                <label class="form-label">Rating</label>
                                <div class="rating-input">
                                    @for($i = 5; $i >= 1; $i--)
                                        <input type="radio" name="rating" value="{{ $i }}" id="star{{ $i }}" required>
                                        <label for="star{{ $i }}"><i class="fas fa-star"></i></label>
                                    @endfor
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="comment" class="form-label">Komentar</label>
                                <textarea name="comment" id="comment" rows="3" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-paper-plane"></i> Kirim Ulasan
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @endif
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-info-circle"></i> Status</h5>
            </div>
            <div class="card-body">
                <div class="timeline">
                    <div class="d-flex mb-3">
                        <div class="me-3">
                            <i class="fas fa-check-circle text-success"></i>
                        </div>
                        <div>
                            <h6>Booking Dibuat</h6>
                            <small class="text-muted">{{ $booking->created_at->format('d M Y H:i') }}</small>
                        </div>
                    </div>
                    @if($booking->status == 'assigned' || $booking->status == 'in_progress' || $booking->status == 'completed')
                        <div class="d-flex mb-3">
                            <div class="me-3">
                                <i class="fas fa-user-check text-info"></i>
                            </div>
                            <div>
                                <h6>Ditugaskan ke Petugas</h6>
                                <small class="text-muted">{{ $booking->updated_at->format('d M Y H:i') }}</small>
                            </div>
                        </div>
                    @endif
                    @if($booking->status == 'in_progress' || $booking->status == 'completed')
                        <div class="d-flex mb-3">
                            <div class="me-3">
                                <i class="fas fa-spinner text-warning"></i>
                            </div>
                            <div>
                                <h6>Pekerjaan Dimulai</h6>
                                <small class="text-muted">{{ $booking->started_at ? $booking->started_at->format('d M Y H:i') : '-' }}</small>
                            </div>
                        </div>
                    @endif
                    @if($booking->status == 'completed')
                        <div class="d-flex mb-3">
                            <div class="me-3">
                                <i class="fas fa-flag-checkered text-success"></i>
                            </div>
                            <div>
                                <h6>Pekerjaan Selesai</h6>
                                <small class="text-muted">{{ $booking->completed_at ? $booking->completed_at->format('d M Y H:i') : '-' }}</small>
                            </div>
                        </div>
                    @endif
                    @if($booking->status == 'cancelled')
                        <div class="d-flex mb-3">
                            <div class="me-3">
                                <i class="fas fa-times-circle text-danger"></i>
                            </div>
                            <div>
                                <h6>Booking Dibatalkan</h6>
                                <small class="text-muted">{{ $booking->updated_at->format('d M Y H:i') }}</small>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if(in_array($booking->status, ['pending', 'assigned']))
            <div class="card mt-3">
                <div class="card-body">
                    <form action="{{ route('user.bookings.cancel', $booking) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Yakin ingin membatalkan booking ini?')">
                            <i class="fas fa-times-circle"></i> Batalkan Booking
                        </button>
                    </form>
                </div>
            </div>
        @endif

        @if($booking->status == 'in_progress')
            <div class="card mt-3">
                <div class="card-body">
                    <a href="{{ route('user.bookings.track', $booking) }}" class="btn btn-success w-100">
                        <i class="fas fa-map-marker-alt"></i> Lacak Order
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<style>
    .rating-input {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
    }
    .rating-input input {
        display: none;
    }
    .rating-input label {
        font-size: 30px;
        color: #ddd;
        cursor: pointer;
        transition: color 0.2s;
    }
    .rating-input label:hover,
    .rating-input label:hover ~ label,
    .rating-input input:checked ~ label {
        color: #f6c445;
    }
</style>
@endsection