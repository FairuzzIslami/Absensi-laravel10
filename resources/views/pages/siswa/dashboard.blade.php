@extends('layout.layout')

@section('content')
    <section>
        <div class="content pt-5 mt-4" id="mainContent">
            <h1 class="h4 mb-4">
                <i class="fa-solid fa-gauge"></i> Dashboard Siswa
            </h1>

            <div class="mb-5 p-3 bg-light rounded shadow-sm">
                <h5 class="fw-bold mb-1">Halo, {{ Auth::user()->username }} 👋</h5>
                <p class="text-muted mb-0">
                    Ini ringkasan absensimu hari ini. Tetap semangat belajar ya! 🎓📚
                </p>
            </div>

            <div class="row g-3">
                <!-- Status Absensi Hari Ini -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card bg-success text-white shadow-sm border-0 p-3 text-center h-100">
                        <i class="fa-solid fa-user-check fa-2x mb-3"></i>
                        <h6 class="card-title">Absensi Hari Ini</h6>
                        @if ($absenHariIni)
                            <span class="badge bg-light text-success px-3 py-2 fw-bold">
                                {{ $absenHariIni->status }}
                            </span>
                        @else
                            <a href="{{ route('siswa.absen.form') }}" class="btn btn-light btn-sm mt-2 fw-semibold">
                                Isi Absensi
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Total Hadir -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card bg-primary text-white shadow-sm border-0 p-3 text-center h-100">
                        <i class="fa-solid fa-calendar-check fa-2x mb-3"></i>
                        <h6 class="card-title">Total Hadir</h6>
                        <h4 class="fw-bold">{{ $totalHadir ?? 0 }}</h4>
                    </div>
                </div>

                <!-- Total Izin -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card bg-warning text-dark shadow-sm border-0 p-3 text-center h-100">
                        <i class="fa-solid fa-envelope-open-text fa-2x mb-3"></i>
                        <h6 class="card-title">Total Izin</h6>
                        <h4 class="fw-bold">{{ $totalIzin ?? 0 }}</h4>
                    </div>
                </div>

                <!-- Total Sakit -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card bg-danger text-white shadow-sm border-0 p-3 text-center h-100">
                        <i class="fa-solid fa-head-side-cough fa-2x mb-3"></i>
                        <h6 class="card-title">Total Sakit</h6>
                        <h4 class="fw-bold">{{ $totalSakit ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
