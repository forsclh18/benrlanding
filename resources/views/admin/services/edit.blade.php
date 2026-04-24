@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Service</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama Service</label>
                <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
            </div>
            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" rows="5" required>{{ $service->description }}</textarea>
            </div>
            <div class="mb-3">
                <label>Icon (Font Awesome)</label>
                <input type="text" name="icon" class="form-control" value="{{ $service->icon }}" placeholder="Contoh: fa-code">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection