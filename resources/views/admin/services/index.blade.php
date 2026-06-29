@extends('layouts.app')

@section('title', 'Kelola Layanan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-concierge-bell text-primary"></i> Kelola Layanan</h1>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Tambah Layanan
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($services->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-concierge-bell fa-3x text-muted mb-3"></i>
                <h5>Belum Ada Layanan</h5>
                <p class="text-muted">Tambahkan layanan pertama Anda.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Durasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->category ?? '-' }}</td>
                                <td>Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                                <td>{{ $service->duration_minutes }} menit</td>
                                <td>
                                    <span class="badge bg-{{ $service->is_active ? 'success' : 'danger' }}">
                                        {{ $service->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.services.toggle', $service) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-{{ $service->is_active ? 'secondary' : 'success' }}">
                                            <i class="fas fa-{{ $service->is_active ? 'pause' : 'play' }}"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus layanan ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $services->links() }}
        @endif
    </div>
</div>
@endsection