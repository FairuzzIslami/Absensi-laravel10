@extends('layout.layout')

@section('content')
<div class="content mt-5 py-4" id="mainContent">
    <h3 class="mb-4"><i class="bi bi-key-fill"></i> Ubah Password</h3>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-4">
            <form action="{{ route('password.update') }}" method="POST">
                @csrf

                {{-- Password Lama --}}
                <div class="mb-3">
                    <label class="form-label">Password Lama</label>
                    <div class="input-group">
                        <input type="password" name="current_password"
                            class="form-control @error('current_password') is-invalid @enderror"
                            placeholder="Masukkan Password Lama" id="currentPassword">
                        <span class="input-group-text toggle-password" onclick="toggleVisibility('currentPassword')">
                            <i class="fa fa-eye"></i>
                        </span>
                        @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Password Baru --}}
                <div class="mb-3">
                    <label class="form-label">Password Baru</label>
                    <div class="input-group">
                        <input type="password" name="new_password"
                            class="form-control @error('new_password') is-invalid @enderror"
                            placeholder="Masukkan Password Baru" id="newPassword">
                        <span class="input-group-text toggle-password" onclick="toggleVisibility('newPassword')">
                            <i class="fa fa-eye"></i>
                        </span>
                        @error('new_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Konfirmasi Password --}}
                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <div class="input-group">
                        <input type="password" name="new_password_confirmation"
                            class="form-control @error('new_password_confirmation') is-invalid @enderror"
                            placeholder="Konfirmasi Password Baru" id="confirmPassword">
                        <span class="input-group-text toggle-password" onclick="toggleVisibility('confirmPassword')">
                            <i class="fa fa-eye"></i>
                        </span>
                    </div>
                    @error('new_password_confirmation')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-warning px-4">
                        <i class="bi bi-check"></i> Ubah Password
                    </button>
                    <a href="{{ route('profile') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
