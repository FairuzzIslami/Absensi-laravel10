@extends('layout.layout')

@section('content')
    <section>
        <div class="content pt-5 mt-4" id="mainContent">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fa-solid fa-user-check me-2"></i> Absensi Siswa
                    </h5>
                </div>

                <div class="card-body">
                    {{-- Form Absensi --}}
                    <form action="{{ route('siswa.absen.store') }}" method="POST">
                        @csrf

                        <!-- Tanggal -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tanggal Hari Ini</label>
                            <div class="input-group w-auto">
                                <span class="input-group-text"><i class="fa-solid fa-calendar-day"></i></span>
                                <input type="date" name="tanggal_kehadiran" class="form-control"
                                    value="{{ now()->format('Y-m-d') }}" readonly>
                            </div>
                        </div>

                        <!-- Status Kehadiran -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Status Kehadiran</label>
                            <div class="input-group w-auto">
                                <span class="input-group-text"><i class="fa-solid fa-check-to-slot"></i></span>
                                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="">-- Pilih Kehadiran --</option>
                                    <option value="Hadir" {{ old('status') == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                                    <option value="Izin" {{ old('status') == 'Izin' ? 'selected' : '' }}>Izin</option>
                                    <option value="Sakit" {{ old('status') == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-paper-plane me-1"></i> Kirim Absensi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
