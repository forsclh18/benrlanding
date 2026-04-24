@extends('layouts.admin')

@section('title', 'Edit Company Profile')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Profil Perusahaan</h4>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nama Perusahaan</label>
                        <input type="text" name="company_name" class="form-control"
                            value="{{ $profile->company_name ?? 'RZF Software' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tagline</label>
                        <input type="text" name="tagline" class="form-control" value="{{ $profile->tagline ?? '' }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="5">{{ $profile->description ?? '' }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Visi</label>
                        <textarea name="vision" class="form-control" rows="3">{{ $profile->vision ?? '' }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Misi</label>
                        <textarea name="mission" class="form-control" rows="5">{{ $profile->mission ?? '' }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Alamat</label>
                        <textarea name="address" class="form-control" rows="3">{{ $profile->address ?? '' }}</textarea>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Telepon</label>
                        <input type="text" name="phone" class="form-control" value="{{ $profile->phone ?? '' }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $profile->email ?? '' }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection
