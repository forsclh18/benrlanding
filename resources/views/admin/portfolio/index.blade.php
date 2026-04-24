@extends('layouts.admin')

@section('title', 'Portfolio')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4>Daftar Portfolio</h4>
    <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">+ Tambah Portfolio</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($portfolios as $key => $portfolio)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $portfolio->title }}</td>
            <td>{{ $portfolio->category ?? '-' }}</td>
            <td>{{ Str::limit($portfolio->description, 100) }}</td>
            <td>
                <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" method="POST" class="d-inline">
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