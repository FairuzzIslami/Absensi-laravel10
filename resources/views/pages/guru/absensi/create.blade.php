@extends('layout.layout')

@section('content')
    <section>
        <div class="content pt-5 mt-4" id="mainContent">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fa-solid fa-user-check me-2"></i> Absensi Guru
                    </h5>
                </div>

                <div class="card-body">
                    {{-- Form Absensi --}}
                    <form action="{{ route('guru.absensi.store') }}" method="POST">
                        @csrf

                        <!-- Pilih Tanggal -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tanggal Kehadiran</label>
                            <div class="input-group w-auto">
                                <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                                <input type="date" name="tanggal_kehadiran"
                                    class="form-control @error('tanggal_kehadiran') is-invalid @enderror"
                                    value="{{ old('tanggal_kehadiran') }}">
                                @error('tanggal_kehadiran')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Status Kehadiran -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Status Kehadiran</label>
                            <div class="input-group w-auto">
                                <span class="input-group-text"><i class="fa-solid fa-check-to-slot"></i></span>
                                <select name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option value="">-- Pilih Kehadiran --</option>
                                    <option value="Hadir" {{ old('status') == 'Hadir' ? 'selected' : '' }}>Hadir
                                    </option>
                                    <option value="Izin" {{ old('status') == 'Izin' ? 'selected' : '' }}>Izin</option>
                                    <option value="Sakit" {{ old('status') == 'Sakit' ? 'selected' : '' }}>Sakit
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('guru.index') }}" class="btn btn-outline-secondary">
                                <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-save me-1"></i> Simpan Absensi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
