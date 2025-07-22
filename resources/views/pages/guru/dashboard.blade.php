@extends('layout.layout')

@section('content')
    <section>
        <div class="content pt-5 mt-4" id="mainContent">
            <h1 class="h4 mb-4">
                <i class="fa-solid fa-gauge"></i> Dashboard Guru
            </h1>

            <div class="row g-3">
                <!-- Card: Status Absensi -->
                <!-- Card: Status Absensi -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-success shadow-sm border-0 p-3 text-center">
                        <i class="fa-solid fa-user-check fa-2x mb-2"></i>
                        <h5 class="card-title">Absensi Hari Ini</h5>
                        @if (!empty($absenHariIni))
                            <h4 class="fw-bold">{{ $absenHariIni->status }}</h4>
                        @else
                            <a href="{{ route('guru.absensi') }}" class="btn btn-light btn-sm mt-2">
                                Isi Absensi
                            </a>
                        @endif
                    </div>
                </div>


                <!-- Card: Jumlah Kelas -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-primary shadow-sm border-0 p-3 text-center">
                        <i class="fa-solid fa-door-open fa-2x mb-2"></i>
                        <h5 class="card-title">Jumlah Kelas</h5>
                        <h4 class="fw-bold">{{ $jumlahKelas ?? 0 }}</h4>
                    </div>
                </div>

                <!-- Card: Jumlah Siswa -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-info shadow-sm border-0 p-3 text-center">
                        <i class="fa-solid fa-users fa-2x mb-2"></i>
                        <h5 class="card-title">Total Siswa</h5>
                        <h4 class="fw-bold">{{ $totalSiswa ?? 0 }}</h4>
                    </div>
                </div>

                <!-- Card: Riwayat Absensi -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-dark bg-danger shadow-sm border-0 p-3 text-center">
                        <i class="fa-solid fa-clock-rotate-left fa-2x mb-2"></i>
                        <h5 class="card-title">Riwayat</h5>
                        <a href="{{route('guru.riwayat')}}" class="btn btn-light btn-sm mt-2">
                            Lihat Riwayat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
