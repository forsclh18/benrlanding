@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4>Daftar Testimoni</h4>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Testimoni
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th width="10%">Foto</th>
                        <th width="20%">Nama</th>
                        <th width="20%">Posisi</th>
                        <th width="25%">Testimoni</th>
                        <th width="10%">Rating</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $key => $testimonial)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-center">
                                @if($testimonial->client_photo)
                                    @if(filter_var($testimonial->client_photo, FILTER_VALIDATE_URL))
                                        <img src="{{ $testimonial->client_photo }}" alt="{{ $testimonial->client_name }}" 
                                             style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                    @else
                                        <img src="{{ asset('storage/' . $testimonial->client_photo) }}" alt="{{ $testimonial->client_name }}" 
                                             style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                    @endif
                                @else
                                    <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center" 
                                         style="width: 40px; height: 40px;">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $testimonial->client_name }}</td>
                            <td>{{ $testimonial->client_position ?? '-' }}</td>
                            <td>{{ Str::limit($testimonial->message, 80) }}</td>
                            <td class="text-center">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $testimonial->rating)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star text-muted"></i>
                                    @endif
                                @endfor
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus testimoni ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <i class="fas fa-star fa-3x text-muted mb-2 d-block"></i>
                                Belum ada testimoni. Silakan tambah testimoni baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection