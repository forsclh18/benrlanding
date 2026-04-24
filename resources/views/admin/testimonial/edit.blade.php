@extends('layouts.admin')

@section('title', 'Edit Testimoni')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Testimoni</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nama Klien</label>
                    <input type="text" name="client_name" class="form-control @error('client_name') is-invalid @enderror" 
                           value="{{ old('client_name', $testimonial->client_name) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Posisi / Perusahaan</label>
                    <input type="text" name="client_position" class="form-control" 
                           value="{{ old('client_position', $testimonial->client_position) }}">
                </div>

                <div class="col-md-12 mb-3">
                    <label>Testimoni</label>
                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" 
                              rows="4" required>{{ old('message', $testimonial->message) }}</textarea>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Rating</label>
                    <select name="rating" class="form-control" required>
                        <option value="5" {{ $testimonial->rating == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5) - Sangat Baik</option>
                        <option value="4" {{ $testimonial->rating == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (4) - Baik</option>
                        <option value="3" {{ $testimonial->rating == 3 ? 'selected' : '' }}>⭐⭐⭐ (3) - Cukup</option>
                        <option value="2" {{ $testimonial->rating == 2 ? 'selected' : '' }}>⭐⭐ (2) - Kurang</option>
                        <option value="1" {{ $testimonial->rating == 1 ? 'selected' : '' }}>⭐ (1) - Sangat Kurang</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Foto Saat Ini</label>
                    @if($testimonial->client_photo)
                        @if(filter_var($testimonial->client_photo, FILTER_VALIDATE_URL))
                            <img src="{{ $testimonial->client_photo }}" style="max-width: 80px; border-radius: 50%;">
                        @else
                            <img src="{{ asset('storage/' . $testimonial->client_photo) }}" style="max-width: 80px; border-radius: 50%;">
                        @endif
                    @else
                        <p class="text-muted">Tidak ada foto</p>
                    @endif
                    <label class="mt-2">Upload Foto Baru</label>
                    <input type="file" name="client_photo" class="form-control" accept="image/*">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Atau URL Foto Online</label>
                    <input type="url" name="image_url" class="form-control" value="{{ $testimonial->client_photo }}" 
                           placeholder="https://example.com/foto.jpg">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah</small>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection