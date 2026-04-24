@extends('layouts.admin')

@section('title', 'Tambah Service')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Service Baru</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama Service</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label>Icon (Font Awesome)</label>
                <input type="text" name="icon" class="form-control" placeholder="Contoh: fa-code">
                <small class="text-muted">Gunakan class Font Awesome, contoh: fa-cogs, fa-code, fa-mobile</small>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection