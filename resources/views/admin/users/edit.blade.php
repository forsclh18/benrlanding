-- Admin Users Edit View
@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title mb-0">Edit User: {{ $user->name }}</h4>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left me-1"></i>Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password Baru <small class="text-muted">(kosongkan jika tidak ingin
                                    mengubah)</small></label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" minlength="8"
                                autocomplete="new-password" placeholder="Kosongkan untuk tidak mengubah">
                            <div class="form-text">Minimal 8 karakter</div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror" minlength="8"
                                autocomplete="new-password">
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            @if (auth()->user()->role === 'super_admin')
                                <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                                    <option value="">Pilih Role</option>
                                    <option value="admin" @selected(old('role', $user->role) == 'admin')>Admin</option>
                                    <option value="super_admin" @selected(old('role', $user->role) == 'super_admin')>Super Admin</option>
                                </select>
                            @else
                                <input type="hidden" name="role" value="admin">
                                <div class="form-control-plaintext bg-light p-2 border">Admin (tidak dapat diubah)</div>
                            @endif
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" onclick="history.back()">
                                <i class="fas fa-arrow-left me-1"></i>Batal
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-1"></i>Update User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const password = document.querySelector('input[name="password"]');
                const confirmPassword = document.querySelector('input[name="password_confirmation"]');

                function validatePassword() {
                    if (password.value && password.value !== confirmPassword.value) {
                        confirmPassword.classList.add('is-invalid');
                        confirmPassword.setCustomValidity('Password tidak cocok');
                    } else {
                        confirmPassword.classList.remove('is-invalid');
                        confirmPassword.setCustomValidity('');
                    }
                }

                password.addEventListener('input', validatePassword);
                confirmPassword.addEventListener('input', validatePassword);
            });
        </script>
    @endpush
@endsection
