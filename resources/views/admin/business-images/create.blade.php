@extends('layouts.admin')

@section('title', 'Tambah Business Image')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Gambar Business Section</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.business-images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Upload Gambar (File)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <small class="text-muted">Atau gunakan URL di bawah</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Atau URL Gambar Online</label>
                    <input type="url" name="image_url" class="form-control" placeholder="https://example.com/gambar.jpg">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Alt Text</label>
                    <input type="text" name="alt_text" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Posisi Urutan</label>
                    <input type="number" name="position" class="form-control" value="{{ \App\Models\BusinessImage::count() + 1 }}">
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.business-images.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection