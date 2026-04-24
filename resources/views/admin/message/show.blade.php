@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">
                <i class="fas fa-envelope me-2"></i> Detail Pesan dari {{ $message->name }}
            </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="150" class="bg-light">Nama Lengkap</th>
                        <td>{{ $message->name }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Email</th>
                        <td>
                            <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-light">Telepon</th>
                        <td>
                            @if ($message->phone)
                                <a href="tel:{{ $message->phone }}">{{ $message->phone }}</a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-light">Pesan</th>
                        <td class="text-wrap">{{ $message->message }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Status</th>
                        <td>
                            @if ($message->is_read)
                                <span class="badge bg-success">
                                    <i class="fas fa-check-circle me-1"></i> Sudah Dibaca
                                </span>
                            @else
                                <span class="badge bg-warning">
                                    <i class="fas fa-clock me-1"></i> Belum Dibaca
                                </span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-light">Dikirim Pada</th>
                        <td>{{ $message->created_at->format('d F Y H:i:s') }}</td>
                    </tr>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>

                <div>
                    @if (!$message->is_read)
                        <form action="{{ route('admin.messages.mark-read', $message->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-check-double me-1"></i> Tandai Sudah Dibaca
                            </button>
                        </form>
                    @endif

                    <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus pesan ini?')">
                            <i class="fas fa-trash me-1"></i> Hapus Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
