@extends('layout.layout')

@section('content')
    <section>
        <div class="content pt-5 mt-4" id="mainContent">
            <h1 class="h4 mb-4">
                <i class="fa-solid fa-gauge"></i> Dashboard Guru
            </h1>

            <div class="mb-5 p-3 bg-light rounded shadow-sm">
                <h5 class="fw-bold mb-1">Hai, {{ Auth::user()->username }} 👋</h5>
                <p class="text-muted mb-0">
                    Semoga harimu menyenangkan! Di bawah ini ringkasan aktivitasmu hari ini. Tetap semangat mengajar! 📚✨
                </p>
            </div>


            <div class="row g-3">
                <!-- Absensi Hari Ini -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card bg-success text-white shadow-sm border-0 p-3 text-center h-100">
                        <i class="fa-solid fa-user-check fa-2x mb-3"></i>
                        <h6 class="card-title">Absensi Hari Ini</h6>
                        @if (!empty($absenHariIni))
                            <span class="badge bg-light text-success px-3 py-2 fw-bold">
                                {{ $absenHariIni->status }}
                            </span>
                        @else
                            <a href="{{ route('guru.absensi') }}" class="btn btn-light btn-sm mt-2 fw-semibold">
                                Isi Absensi
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Jumlah Kelas -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card bg-primary text-white shadow-sm border-0 p-3 text-center h-100">
                        <i class="fa-solid fa-door-open fa-2x mb-3"></i>
                        <h6 class="card-title">Jumlah Kelas</h6>
                        <h4 class="fw-bold">{{ $jumlahKelas ?? 0 }}</h4>
                    </div>
                </div>

                <!-- Total Siswa -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card bg-warning text-white shadow-sm border-0 p-3 text-center h-100">
                        <i class="fa-solid fa-users fa-2x mb-3"></i>
                        <h6 class="card-title">Total Siswa</h6>
                        <h4 class="fw-bold">{{ $totalSiswa ?? 0 }}</h4>
                    </div>
                </div>

                <!-- Riwayat -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card bg-danger text-white shadow-sm border-0 p-3 text-center h-100">
                        <i class="fa-solid fa-clock-rotate-left fa-2x mb-3"></i>
                        <h6 class="card-title">Riwayat Absensi</h6>
                        <a href="{{ route('guru.riwayat') }}" class="btn btn-light btn-sm mt-2 fw-semibold">
                            Lihat Riwayat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
