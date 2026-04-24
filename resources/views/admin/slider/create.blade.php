@extends('layouts.admin')

@section('title', 'Tambah Slider')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Slider Baru</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') }}" required>
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Subjudul</label>
                <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror"
                       value="{{ old('subtitle') }}" required>
                @error('subtitle') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Teks (opsional)</label>
                <textarea name="text" class="form-control @error('text') is-invalid @enderror" rows="3">{{ old('text') }}</textarea>
                @error('text') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Tombol Link</label>
                <input type="text" name="btn_link" class="form-control @error('btn_link') is-invalid @enderror"
                       value="{{ old('btn_link', '#contact') }}" placeholder="#contact">
                @error('btn_link') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Gambar</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                <small class="text-muted">Format: jpeg, png, jpg | Max: 2MB</small>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Urutan</label>
                    <input type="number" name="order" class="form-control @error('order') is-invalid @enderror"
                           value="{{ old('order', 0) }}" min="0">
                    @error('order') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="d-block">&nbsp;</label>
                    <div class="form-check">
                        <input type="checkbox" name="is_active" value="1" class="form-check-input"
                               {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label">Aktif</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
