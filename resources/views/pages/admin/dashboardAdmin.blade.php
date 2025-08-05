    @extends('layout.layout')

    @section('content')
        <section>
            <!-- Konten Utama -->
            <section id="Konten">
                <div class="content pt-5 mt-4" id="mainContent">
                    <!-- Sambutan -->
                    <div class="mb-4">
                        <h2 class="fw-bold text-primary">👋 Hai, {{ Auth::user()->username }}!</h2>
                        <p class="text-muted fs-6">
                            Selamat datang di <strong>Dashboard Admin</strong>. Lihat sekilas statistik utama sistem di
                            bawah ini.
                        </p>
                    </div>

                    <div class="row g-3">
                        <!-- Card: Data Guru -->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-primary shadow-sm border-0 p-3 text-center">
                                <i class="fa-solid fa-user-tie fa-2x mb-2"></i>
                                <h5 class="card-title">Data Guru</h5>
                                <h4 class="fw-bold">{{ $totalGuru }}</h4>
                            </div>
                        </div>

                        <!-- Card: Data Siswa -->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-danger shadow-sm border-0 p-3 text-center">
                                <i class="fa-solid fa-user fa-2x mb-2"></i>
                                <h5 class="card-title">Data Siswa</h5>
                                <h4 class="fw-bold">{{ $totalSiswa }}</h4>
                            </div>
                        </div>

                        <!-- Card: Data Kelas -->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-warning shadow-sm border-0 p-3 text-center">
                                <i class="fa-solid fa-school fa-2x mb-2"></i>
                                <h5 class="card-title">Data Kelas</h5>
                                <h4 class="fw-bold">{{ $totalKelas }}</h4>
                            </div>
                        </div>
                        <!-- Card: Kehadiran Hari Ini -->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-success shadow-sm border-0 p-3 text-center">
                                <i class="fa-solid fa-calendar-check fa-2x mb-2"></i>
                                <h5 class="card-title">Kehadiran Hari Ini</h5>
                                <h4 class="fw-bold">{{ $totalKehadiranHariIni }}</h4>
                            </div>
                        </div>

                        <!-- Kode Absensi Hari Ini -->
                        <div class="row mt-4">
                            <!-- Guru -->
                            <div class="col-md-6 mb-4">
                                <div class="card shadow-sm border-0 p-4 h-100">
                                    <h5 class="mb-3 text-success">
                                        <i class="fa-solid fa-user-tie me-2"></i> Kode Absensi <strong>Guru</strong> Hari
                                        Ini
                                    </h5>

                                    @if ($kodeHariIniGuru)
                                        <div class="alert alert-success mb-0">
                                            Kode absensi: <span class="fw-bold">{{ $kodeHariIniGuru->kode }}</span>
                                        </div>
                                    @else
                                        <div
                                            class="alert alert-warning d-flex justify-content-between align-items-center mb-0">
                                            <span>Belum ada kode absensi untuk guru.</span>
                                            <a href="{{ route('admin.kode.create', ['role' => 'guru']) }}"
                                                class="btn btn-sm btn-outline-success">Buat</a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Siswa -->
                            <div class="col-md-6 mb-4">
                                <div class="card shadow-sm border-0 p-4 h-100">
                                    <h5 class="mb-3 text-primary">
                                        <i class="fa-solid fa-user-graduate me-2"></i> Kode Absensi <strong>Siswa</strong>
                                        Hari Ini
                                    </h5>

                                    @if ($kodeHariIniSiswa)
                                        <div class="alert alert-primary mb-0">
                                            Kode absensi: <span class="fw-bold">{{ $kodeHariIniSiswa->kode }}</span>
                                        </div>
                                    @else
                                        <div
                                            class="alert alert-warning d-flex justify-content-between align-items-center mb-0">
                                            <span>Belum ada kode absensi untuk siswa.</span>
                                            <a href="{{ route('admin.kode.create', ['role' => 'siswa']) }}"
                                                class="btn btn-sm btn-outline-primary">Buat</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
            </section>
        @endsection
