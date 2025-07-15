@extends('layout.layout')

@section('content')
    <!-- navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#hero">E-Absensi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#hero">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#manfaat">Manfaat</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    <li class="nav-item"><a class="btn btn-blue ms-lg-3 mt-2 mt-lg-0" href="{{route('login.index')}}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero section -->
    <section class="hero" id="hero">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
                    <h1 class="fw-bold display-5 display-md-3 display-lg-1">E-ABSENSI</h1>
                    <p class="lead mb-0">Aplikasi Absensi Digital untuk Sekolah Modern</p>
                    <p class="lead">Pantau Kehadiran Siswa Secara Efisien dan Real-Time.</p>
                    <a href="#tentang" class="btn btn-blue mt-2">Tentang Kami</a>
                </div>

                <div class="col-lg-6 text-center">
                    <img src="{{asset('asset/image/homePage2.png')}}" alt="Ilustrasi"
                        class="img-fluid rounded mx-auto d-block animation">
                </div>
            </div>
        </div>
    </section>

    <!-- tentang section -->
    <section id="tentang" class="py-5 bg-white">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center">
                    <img src="{{asset('asset/image/homePage.png')}}" alt="Tentang Kami" class="img-fluid animation  rounded mx-auto d-block">
                </div>

                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3 text-primary">Tentang Aplikasi</h2>
                    <p class="lead text-muted">
                        <strong>E-ABSENSI</strong> hadir untuk menjawab kebutuhan sekolah di era digital.
                        Aplikasi ini memudahkan proses pencatatan kehadiran secara praktis dan efisien.
                    </p>
                    <p class="text-muted">
                        Dengan tampilan modern dan sistem yang terintegrasi, guru, siswa, dan admin dapat mengakses data
                        absensi kapan saja, di mana saja.
                    </p>
                    <ul class="list-unstyled text-muted">
                        <li>📝 Pencatatan lebih akurat dan real-time</li>
                        <li>🌐 Bisa diakses dari berbagai perangkat</li>
                        <li>📊 Laporan absensi otomatis & efisien</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- manfaat section -->
    <section id="manfaat" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold text-primary mb-5">Manfaat Dari Aplikasi E-ABSENSI</h2>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-lg border-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">📌 Untuk Guru</h5>
                            <ul class="list-unstyled mt-3 text-muted">
                                <li>1. Mencatat kehadiran lebih cepat</li>
                                <li>2. Tidak perlu rekap manual</li>
                                <li>3. Memantau siswa absen langsung</li>
                                <li>4. Akses laporan setiap saat</li>
                                <li>5. Penghematan waktu</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-lg border-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">👨‍🎓 Untuk Siswa</h5>
                            <ul class="list-unstyled mt-3 text-muted">
                                <li>1. Tahu kehadiran sendiri</li>
                                <li>2. Tidak bisa titip absen</li>
                                <li>3. Bisa cek riwayat kehadiran</li>
                                <li>4. Mudah saat daring/luring</li>
                                <li>5. Lebih transparan</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-lg border-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">🏫 Untuk Sekolah</h5>
                            <ul class="list-unstyled mt-3 text-muted">
                                <li>1. Data terpusat & aman</li>
                                <li>2. Meningkatkan kedisiplinan</li>
                                <li>3. Laporan ke dinas lebih mudah</li>
                                <li>4. Monitoring realtime</li>
                                <li>5. Modernisasi sistem</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center g-4 mt-3">
                <div class="col-md-4">
                    <div class="card h-100 shadow-lg border-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">🎯 Untuk Orang Tua</h5>
                            <ul class="list-unstyled mt-3 text-muted">
                                <li>1. Memantau kehadiran anak</li>
                                <li>2. Dapat notifikasi langsung</li>
                                <li>3. Komunikasi lebih mudah</li>
                                <li>4. Bisa diakses dari rumah</li>
                                <li>5. Menumbuhkan disiplin</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-lg border-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">🛡️ Untuk Admin</h5>
                            <ul class="list-unstyled mt-3 text-muted">
                                <li>1. Kelola semua akun</li>
                                <li>2. Jadwal & data kelas rapi</li>
                                <li>3. Backup otomatis</li>
                                <li>4. Sistem terkontrol</li>
                                <li>5. Kendali penuh</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- kontak section -->
    <section id="kontak" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h6 class="fw-semibold color-blue">Kontak Kami</h6>
                <h2 class="fw-bold text-dark">Temukan Kami Di Bawah</h2>
            </div>

            <div class="row g-4">
                <div class="col-lg-5">
                    <ul class="list-unstyled fs-5">
                        <li class="mb-3"><i class="fa-solid fa-location-dot color-blue me-2"></i> <strong>Location:</strong>
                            Boyolali, Jawa Tengah</li>
                        <li class="mb-3"><i class="fa-solid fa-phone color-blue me-2"></i><strong>Phone:</strong> +62
                            822 2010 2177</li>
                        <li class="mb-3"><i class="fa-solid fa-envelope color-blue me-2"></i><strong>Email:</strong>
                            admin@eabsensi.id</li>
                        <li class="mb-3"><i class="fa-brands fa-instagram color-blue me-2"></i> <strong>Instagram:</strong>
                            @eabsensi.id</li>
                    </ul>
                </div>

                <div class="col-lg-7">
                    <div class="ratio ratio-16x9 shadow rounded">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.406566936078!2d110.59388507500238!3d-7.530557192482604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a6eb6fddaa7bb%3A0x94f51cc0049817d8!2sSMK%20Muhammadiyah%204%20Boyolali!5e0!3m2!1sid!2sid!4v1752543341962!5m2!1sid!2sid" width="600" height="450"
                            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer section -->
    <footer class="text-center bg-light mt-5">
        <div class="text-center p-3" style="background-color: rgba(0, 123, 255, 0.1);">
            © 2025 Fairuz Aqila Islami. All rights reserved.
        </div>
    </footer>
    @endsection
