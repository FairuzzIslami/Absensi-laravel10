@extends('layout.layout')

@section('content')
    <div class="content mt-5" id="mainContent">
        <div class="card shadow-sm border-0 rounded-3 p-4">
            <h4 class="mb-4">
                <i class="fa-solid fa-qrcode text-primary"></i> Buat Kode Absensi
            </h4>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('admin.kode.store') }}" method="POST">
                @csrf

                {{-- KODE --}}
                <div class="mb-3">
                    <label for="kode" class="form-label fw-semibold">Kode Absensi</label>
                    <div class="input-group">
                        <input type="text" name="kode" id="kode"
                            class="form-control shadow-sm @error('kode') is-invalid @enderror"
                            placeholder="Klik tombol untuk membuat kode otomatis" value="{{ old('kode') }}">
                        <button class="btn btn-outline-primary" type="button" onclick="generateKode()">
                            <i class="fas fa-random me-1"></i> Generate Kode
                        </button>
                    </div>
                    @error('kode')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                </div>

                {{-- TANGGAL --}}
                <div class="mb-3">
                    <label for="tanggal" class="form-label fw-semibold">Tanggal Berlaku</label>
                    <input type="date" name="tanggal"
                        class="form-control shadow-sm @error('tanggal') is-invalid @enderror"
                        value="{{ old('tanggal', now()->format('Y-m-d')) }}" min="{{ now()->format('Y-m-d') }}"
                        max="{{ now()->format('Y-m-d') }}">
                    @error('tanggal')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- UNTUK ROLE --}}
                <div class="mb-4">
                    <label for="untuk_role" class="form-label fw-semibold">Ditujukan Untuk</label>
                    <select name="untuk_role" class="form-select shadow-sm @error('untuk_role') is-invalid @enderror">
                        <option value="">-- Pilih Jenis Pengguna --</option>
                        <option value="siswa" {{ old('untuk_role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                        <option value="guru" {{ old('untuk_role') == 'guru' ? 'selected' : '' }}>Guru</option>
                    </select>
                    @error('untuk_role')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- DURASI (Menit) --}}
                <div class="mb-4">
                    <label for="durasi" class="form-label fw-semibold">Durasi Berlaku (Menit)</label>
                    <input type="number" name="durasi"
                        class="form-control shadow-sm @error('durasi') is-invalid @enderror" placeholder="Contoh: 10"
                        min="1" value="{{ old('durasi', 5) }}">
                    @error('durasi')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-paper-plane"></i> Simpan Kode
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
