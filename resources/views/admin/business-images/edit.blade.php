@extends('layouts.admin')

@section('title', 'Edit Business Image')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Gambar Business Section</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.business-images.update', $image->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Gambar Saat Ini</label>
                    @if($image->image_url)
                        <img src="{{ $image->image_url }}" class="img-fluid mb-2" style="max-height: 150px;">
                    @elseif($image->image)
                        <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid mb-2" style="max-height: 150px;">
                    @endif
                </div>
                <div class="col-md-6 mb-3">
                    <label>Upload Gambar Baru (File)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Atau URL Gambar Online</label>
                    <input type="url" name="image_url" class="form-control" value="{{ $image->image_url }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Alt Text</label>
                    <input type="text" name="alt_text" class="form-control" value="{{ $image->alt_text }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Posisi Urutan</label>
                    <input type="number" name="position" class="form-control" value="{{ $image->position }}">
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.business-images.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection