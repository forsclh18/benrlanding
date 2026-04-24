@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4>Daftar Services</h4>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">+ Tambah Service</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Icon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($services as $key => $service)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $service->name }}</td>
            <td>{{ Str::limit($service->description, 100) }}</td>
            <td><i class="fa {{ $service->icon }}"></i> {{ $service->icon }}</td>
            <td>
                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection