@extends('layouts.app')

@section('title', 'Kelola Artikel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-newspaper text-primary"></i> Kelola Artikel</h1>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Tambah Artikel
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($articles->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                <h5>Belum Ada Artikel</h5>
                <p class="text-muted">Tambahkan artikel pertama Anda.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ Str::limit($article->title, 40) }}</td>
                                <td>{{ $article->category ?? '-' }}</td>
                                <td>{{ $article->author ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-{{ $article->is_published ? 'success' : 'danger' }}">
                                        {{ $article->is_published ? 'Published' : 'Draft' }}
                                    </span>
                                </td>
                                <td>{{ $article->formatted_date }}</td>
                                <td>
                                    <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus artikel ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $articles->links() }}
        @endif
    </div>
</div>
@endsection