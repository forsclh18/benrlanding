@extends('layouts.admin')

@section('title', 'Edit Portfolio')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Portfolio</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Judul</label>
                    <input type="text" name="title" class="form-control" value="{{ $portfolio->title }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Kategori</label>
                    <input type="text" name="category" class="form-control" value="{{ $portfolio->category }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control" rows="5" required>{{ $portfolio->description }}</textarea>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label>Gambar Saat Ini</label>
                    @if($portfolio->image)
                        <div class="mb-2">
                            @if(filter_var($portfolio->image, FILTER_VALIDATE_URL))
                                <img src="{{ $portfolio->image }}" style="max-width: 200px; max-height: 150px;" class="img-thumbnail">
                            @else
                                <img src="{{ asset('storage/' . $portfolio->image) }}" style="max-width: 200px; max-height: 150px;" class="img-thumbnail">
                            @endif
                        </div>
                    @else
                        <p class="text-muted">Belum ada gambar</p>
                    @endif
                    
                    <label>Upload Gambar Baru</label>
                    <input type="file" name="image_file" class="form-control" accept="image/*">
                    <small class="text-muted">Format: jpeg, png, jpg, gif | Max: 2MB</small>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label>Atau URL Gambar Online</label>
                    <input type="url" name="image_url" class="form-control" value="{{ $portfolio->image }}" placeholder="https://example.com/gambar.jpg">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah</small>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection