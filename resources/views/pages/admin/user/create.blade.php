@extends('layout.layout')

@section('content')
<section>
    <div class="content pt-5 mt-4" id="mainContent">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="fa-solid fa-user-plus me-2"></i> Tambah User
                </h5>
            </div>
            <div class="card-body">
                {{-- Tampilkan Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Oops!</strong> Terjadi kesalahan.
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('user.store') }}" method="POST">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan nama" value="{{ old('username') }}" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan email" value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                        </div>
                    </div>

                    <!-- Role -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Role</label>
                        <select name="id_role" class="form-select" required>
                            <option value="">-- Pilih Role --</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->role_id }}">{{ ucfirst($role->nama_role) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Kelas -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Kelas (Opsional)</label>
                        <select name="id_kelas" class="form-select">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id_kelas }}">{{ $k->kelas }} - {{ ucfirst($k->jurusan) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tombol -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
