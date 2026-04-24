@extends('layouts.admin')

@section('title', 'Tambah User')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Tambah User Baru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            minlength="5" autocomplete="new-password" required>
                        <div class="form-text">Minimal 5 karakter</div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"
                            minlength="5" autocomplete="new-password" required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
    <label class="form-label">Role</label>
    @if(auth()->check() && auth()->user()->isSuperAdmin())
        <select name="role" class="form-select @error('role') is-invalid @enderror" required>
            <option value="">Pilih Role</option>
            <option value="super_admin" {{ old('role') == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
        </select>
    @elseif(auth()->check() && auth()->user()->isAdmin())
        <select name="role" class="form-select @error('role') is-invalid @enderror" required>
            <option value="">Pilih Role</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
        </select>
    @else
        <input type="hidden" name="role" value="user">
        <div class="form-control-plaintext">User</div>
    @endif
    @error('role')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Simpan User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const password = document.querySelector('input[name="password"]');
        const confirmPassword = document.querySelector('input[name="password_confirmation"]');

        function validatePasswordMatch() {
            if (password.value !== confirmPassword.value) {
                confirmPassword.classList.add('is-invalid');
                return false;
            } else {
                confirmPassword.classList.remove('is-invalid');
                return true;
            }
        }

        password.addEventListener('input', function() {
            if (confirmPassword.value.length > 0) {
                validatePasswordMatch();
            }
        });

        confirmPassword.addEventListener('input', validatePasswordMatch);

        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            if (password.value !== confirmPassword.value) {
                e.preventDefault();
                alert('Password dan konfirmasi password tidak cocok!');
            }
        });
    });
</script>
@endpush
