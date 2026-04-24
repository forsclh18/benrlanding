@extends('layouts.admin')

@section('title', 'Edit Slider')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Slider</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title', $slider->title) }}" required>
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Subjudul</label>
                <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror"
                       value="{{ old('subtitle', $slider->subtitle) }}" required>
                @error('subtitle') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Teks</label>
                <textarea name="text" class="form-control @error('text') is-invalid @enderror" rows="3">{{ old('text', $slider->text) }}</textarea>
                @error('text') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Tombol Link</label>
                <input type="text" name="btn_link" class="form-control @error('btn_link') is-invalid @enderror"
                       value="{{ old('btn_link', $slider->btn_link) }}">
                @error('btn_link') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Gambar Saat Ini</label>
                @if($slider->image)
                    <div class="mb-2">
                        @if(filter_var($slider->image, FILTER_VALIDATE_URL))
                            <img src="{{ $slider->image }}" style="max-width: 200px; max-height: 150px;" class="img-thumbnail">
                        @else
                            <img src="{{ asset('storage/' . $slider->image) }}" style="max-width: 200px; max-height: 150px;" class="img-thumbnail">
                        @endif
                    </div>
                @else
                    <p class="text-muted">Belum ada gambar</p>
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Urutan</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $slider->order) }}" min="0">
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-check mt-4">
                        <input type="checkbox" name="is_active" value="1" class="form-check-input"
                               {{ old('is_active', $slider->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label">Aktif</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection