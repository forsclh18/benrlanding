@extends('layouts.admin')

@section('title', 'Tambah Testimoni')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Testimoni Baru</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nama Klien</label>
                    <input type="text" name="client_name" class="form-control @error('client_name') is-invalid @enderror" required>
                    @error('client_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Posisi / Perusahaan</label>
                    <input type="text" name="client_position" class="form-control" placeholder="Contoh: Owner - Toko Berkah Jaya">
                </div>

                <div class="col-md-12 mb-3">
                    <label>Testimoni</label>
                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="4" required></textarea>
                    @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label>Rating</label>
                    <select name="rating" class="form-control @error('rating') is-invalid @enderror" required>
                        <option value="5">⭐⭐⭐⭐⭐ (5) - Sangat Baik</option>
                        <option value="4">⭐⭐⭐⭐ (4) - Baik</option>
                        <option value="3">⭐⭐⭐ (3) - Cukup</option>
                        <option value="2">⭐⭐ (2) - Kurang</option>
                        <option value="1">⭐ (1) - Sangat Kurang</option>
                    </select>
                    @error('rating') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label>Upload Foto</label>
                    <input type="file" name="client_photo" class="form-control" accept="image/*">
                    <small class="text-muted">Format: jpeg, png, jpg | Max: 2MB</small>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Atau URL Foto Online</label>
                    <input type="url" name="image_url" class="form-control" placeholder="https://example.com/foto.jpg">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection