@extends('layouts.admin')

@section('title', 'Tambah Anggota Tim')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Tambah Anggota Tim Baru</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.teams.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Jabatan</label>
                    <input type="text" name="position" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Image</label>
                    <input type="text" name="image" class="form-control" placeholder="assets/images/team/xxx.jpg">
                </div>
                <div class="mb-3">
                    <label>Photo URL</label>
                    <input type="text" name="photo" class="form-control" placeholder="assets/images/team/xxx.jpg">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
