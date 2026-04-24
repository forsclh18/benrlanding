@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4>Daftar Pesan Masuk</h4>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th width="20%">Nama</th>
                        <th width="25%">Email</th>
                        <th width="30%">Pesan</th>
                        <th width="10%">Status</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $key => $message)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ Str::limit($message->message, 100) }}</td>
                            <td class="text-center">
                                @if ($message->is_read)
                                    <span class="badge bg-success">
                                        <i class="fas fa-check-circle me-1"></i> Sudah Dibaca
                                    </span>
                                @else
                                    <span class="badge bg-warning">
                                        <i class="fas fa-clock me-1"></i> Belum Dibaca
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus pesan ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-2 d-block"></i>
                                Belum ada pesan masuk
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection