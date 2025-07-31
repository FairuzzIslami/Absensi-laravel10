@extends('layout.layout')

@section('content')
<div class="content mt-5 py-4" id="mainContent">
    <div class="mb-4">
        <h3 class="fw-bold"><i class="bi bi-pencil-square me-2"></i> Edit Profil</h3>
        <p class="text-muted">Perbarui informasi akun Anda di bawah ini.</p>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Input Nama -->
                <div class="mb-3">
                    <label class="form-label fw-semibold"><i class="bi bi-person-fill me-1"></i> Nama</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                        value="{{ old('username', $user->username) }}" required>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Email -->
                <div class="mb-3">
                    <label class="form-label fw-semibold"><i class="bi bi-envelope-fill me-1"></i> Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Upload Foto -->
                <div class="mb-3">
                    <label class="form-label fw-semibold"><i class="bi bi-image-fill me-1"></i> Foto Profil <span class="text-muted">(Opsional)</span></label>
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if ($user->foto)
                        <div class="mt-3">
                            <p class="text-muted mb-1">Foto saat ini:</p>
                            <img src="{{ asset('storage/' . $user->foto) }}" class="rounded shadow-sm" width="100" alt="Foto Profil">
                        </div>
                    @endif
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('profile') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
