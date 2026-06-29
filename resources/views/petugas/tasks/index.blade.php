@extends('layouts.app')

@section('title', 'Daftar Tugas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-tasks text-primary"></i> Daftar Tugas</h1>
</div>

<div class="card">
    <div class="card-body">
        @if($tasks->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                <h5>Semua Tugas Selesai!</h5>
                <p class="text-muted">Tidak ada tugas yang perlu dikerjakan.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Layanan</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td><strong>{{ $task->booking_code }}</strong></td>
                                <td>{{ $task->service->name }}</td>
                                <td>{{ $task->user->name }}</td>
                                <td>{{ $task->booking_date->format('d M Y') }} {{ $task->booking_time }}</td>
                                <td>{{ Str::limit($task->address, 30) }}</td>
                                <td>
                                    <span class="badge bg-{{ $task->status_badge }}">
                                        {{ $task->status_text }}
                                    </span>
                                </td>
                                <td>
                                    @if($task->status == 'assigned')
                                        <form action="{{ route('petugas.update-status', $task) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="in_progress">
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="fas fa-play"></i> Mulai
                                            </button>
                                        </form>
                                    @endif
                                    @if($task->status == 'in_progress')
                                        <form action="{{ route('petugas.update-status', $task) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="completed">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="fas fa-check"></i> Selesai
                                            </button>
                                        </form>
                                    @endif
                                    @if($task->status == 'completed' || $task->status == 'cancelled')
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $tasks->links() }}
        @endif
    </div>
</div>
@endsection