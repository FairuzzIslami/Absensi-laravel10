@extends('layout.layout')

@section('content')
    <div class="container my-5">
        <h2 class="text-center fw-bold mb-4">Tambahkan Data Kehadiran</h2>

        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold"><i class="fas fa-calendar-plus me-2"></i> Form Input Kegiatan</h5>
                <a href="{{ url('/kehadiran') }}" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <div class="card-body">
                <form action="{{ url('/kehadiran') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_kegiatan" class="form-label fw-semibold">
                            <i class="fas fa-bullhorn me-1"></i> Nama Kegiatan
                        </label>
                        <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" value="{{ old('nama_kegiatan') }}">
                        @error('nama_kegiatan')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tgl_kegiatan" class="form-label fw-semibold">
                            <i class="fas fa-calendar-day me-1"></i> Tanggal Kegiatan
                        </label>
                        <input type="date" name="tgl_kegiatan" class="form-control" id="tgl_kegiatan" value="{{ old('tgl_kegiatan') }}">
                        @error('tgl_kegiatan')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="waktu_kegiatan" class="form-label fw-semibold">
                            <i class="fas fa-clock me-1"></i> Waktu Kegiatan
                        </label>
                        <input type="time" name="waktu_kegiatan" class="form-control" id="waktu_kegiatan" value="{{ old('waktu_kegiatan') }}">
                        @error('waktu_kegiatan')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-paper-plane me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
