@extends('layouts.admin')

@section('title', 'Edit Anggota Tim')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Anggota Tim</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.teams.update', $team->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="{{ $team->name }}" required>
            </div>
            <div class="mb-3">
                <label>Jabatan</label>
                <input type="text" name="position" class="form-control" value="{{ $team->position }}" required>
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="text" name="image" class="form-control" value="{{ $team->image }}">
            </div>
            <div class="mb-3">
                <label>Image URL</label>
                <input type="text" name="image_url" class="form-control" value="{{ $team->image_url }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection