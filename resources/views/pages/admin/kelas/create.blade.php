@extends('layout.layout')

@section('content')
<section>
    <div class="content pt-5 mt-4" id="mainContent">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="fa-solid fa-door-open me-2"></i> Tambah Kelas
                </h5>
            </div>
            <div class="card-body">

                <form action="{{ route('kelas.store') }}" method="POST">
                    @csrf
                    <!-- Nama Kelas -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Kelas</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-door-closed"></i></span>
                            <select name="kelas" class="form-select @error('kelas') is-invalid @enderror">
                                <option value="">-- Pilih Kelas --</option>
                                <option value="10" {{ old('kelas') == '10' ? 'selected' : '' }}>10</option>
                                <option value="11" {{ old('kelas') == '11' ? 'selected' : '' }}>11</option>
                                <option value="12" {{ old('kelas') == '12' ? 'selected' : '' }}>12</option>
                            </select>
                            @error('kelas')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Jurusan -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Jurusan</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                            <select name="jurusan" class="form-select @error('jurusan') is-invalid @enderror">
                                <option value="">-- Pilih Jurusan --</option>
                                <option value="animasi" {{ old('jurusan') == 'animasi' ? 'selected' : '' }}>Animasi</option>
                                <option value="rpl" {{ old('jurusan') == 'rpl' ? 'selected' : '' }}>RPL</option>
                                <option value="tsm" {{ old('jurusan') == 'tsm' ? 'selected' : '' }}>TSM</option>
                                <option value="tkr" {{ old('jurusan') == 'tkr' ? 'selected' : '' }}>TKR</option>
                                <option value="farmasi" {{ old('jurusan') == 'farmasi' ? 'selected' : '' }}>Farmasi</option>
                                <option value="tmi" {{ old('jurusan') == 'tmi' ? 'selected' : '' }}>TMI</option>
                                <option value="tataboga" {{ old('jurusan') == 'tataboga' ? 'selected' : '' }}>Tataboga</option>
                            </select>
                            @error('jurusan')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('kelas.index') }}" class="btn btn-outline-secondary">
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
