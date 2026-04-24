@extends('layouts.admin')

@section('title', 'Team')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4>Daftar Tim</h4>
    <a href="{{ route('admin.teams.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Anggota
    </a>
</div>

@if (session('success'))
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
                        <th width="15%">Foto</th>
                        <th width="25%">Nama</th>
                        <th width="30%">Jabatan</th>
                        <th width="25%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teams as $key => $team)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-center">
                                @if($team->image_url)
                                    <img src="{{ $team->image_url }}" alt="{{ $team->name }}"
                                         style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                @elseif($team->image)
                                    <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}"
                                         style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                @else
                                    <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center"
                                         style="width: 40px; height: 40px;">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->position }}</td>
                            <td>
                                <a href="{{ route('admin.teams.edit', $team->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.teams.destroy', $team->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus anggota tim ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <i class="fas fa-users fa-3x text-muted mb-2 d-block"></i>
                                Belum ada data tim. Silakan tambah anggota tim baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
