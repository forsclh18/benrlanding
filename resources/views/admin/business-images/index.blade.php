@extends('layouts.admin')

@section('title', 'Business Images')

@section('content')
    <div class="d-flex justify-content-between mb-4">
        <h4>Daftar Gambar Business Section</h4>
        <a href="{{ route('admin.business-images.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Gambar
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach ($images as $image)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        @if ($image->image_url)
                            <img src="{{ $image->image_url }}" class="img-fluid mb-2"
                                style="height: 150px; object-fit: cover;">
                        @elseif($image->image)
                            <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid mb-2"
                                style="height: 150px; object-fit: cover;">
                        @else
                            <div class="bg-secondary d-flex align-items-center justify-content-center mb-2"
                                style="height: 150px;">
                                <i class="fas fa-image fa-3x text-white"></i>
                            </div>
                        @endif
                        <p><strong>Alt:</strong> {{ $image->alt_text ?? '-' }}</p>
                        <p><strong>Posisi:</strong> {{ $image->position }}</p>
                        <div class="btn-group">
                            <a href="{{ route('admin.business-images.edit', $image->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.business-images.destroy', $image->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin hapus?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if ($images->isEmpty())
        <div class="alert alert-info text-center">
            Belum ada gambar. Silakan tambah gambar baru.
        </div>
    @endif
@endsection
