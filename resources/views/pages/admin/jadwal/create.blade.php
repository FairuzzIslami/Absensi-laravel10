@extends('layout.layout')

@section('content')
<section>
    <div class="content pt-5 mt-4" id="mainContent">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="fa-solid fa-calendar-plus me-2"></i> Tambah Jadwal Mengajar
                </h5>
            </div>

            <div class="card-body">
                <form action="{{ route('jadwal.store') }}" method="POST">
                    @csrf

                    <!-- Guru -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Guru</label>
                        <select name="guru_id" class="form-select @error('guru_id') is-invalid @enderror">
                            <option value="">-- Pilih Guru --</option>
                            @foreach ($guru as $g)
                                <option value="{{ $g->id }}" {{ old('guru_id') == $g->id ? 'selected' : '' }}>
                                    {{ $g->username }}
                                </option>
                            @endforeach
                        </select>
                        @error('guru_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kelas -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Kelas</label>
                        <select name="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id_kelas }}" {{ old('kelas_id') == $k->id_kelas ? 'selected' : '' }}>
                                    {{ $k->kelas }} - {{ strtoupper($k->jurusan) }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Hari -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Hari</label>
                        <select name="hari" class="form-select @error('hari') is-invalid @enderror">
                            <option value="">-- Pilih Hari --</option>
                            @foreach (['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                                <option value="{{ $hari }}" {{ old('hari') == $hari ? 'selected' : '' }}>
                                    {{ $hari }}
                                </option>
                            @endforeach
                        </select>
                        @error('hari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jam Mulai -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Jam Mulai</label>
                        <input type="time" name="jam_mulai"
                               class="form-control @error('jam_mulai') is-invalid @enderror"
                               value="{{ old('jam_mulai') }}">
                        @error('jam_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jam Selesai -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Jam Selesai</label>
                        <input type="time" name="jam_selesai"
                               class="form-control @error('jam_selesai') is-invalid @enderror"
                               value="{{ old('jam_selesai') }}">
                        @error('jam_selesai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('jadwal.index') }}" class="btn btn-outline-secondary">
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
