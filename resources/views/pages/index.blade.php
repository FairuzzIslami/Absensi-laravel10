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
                    <li class="nav-item"><a class="btn btn-blue ms-lg-3 mt-2 mt-lg-0"
                            href="{{ route('login.index') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero section -->
    <section class="hero" id="hero" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
                    <h1 class="fw-bold display-5 display-md-3 display-lg-1">E-ABSENSI</h1>
                    <p class="lead mb-0">Aplikasi Absensi Digital untuk Sekolah Modern</p>
                    <p class="lead">Pantau Kehadiran Siswa Secara Efisien dan Real-Time.</p>
                    <a href="#tentang" class="btn btn-blue mt-2">Tentang Kami</a>
                </div>

                <div class="col-lg-6 text-center">
                    <img src="{{ asset('asset/image/homePage2.png') }}" alt="Ilustrasi"
                        class="img-fluid rounded mx-auto d-block animation">
                </div>
            </div>
        </div>
    </section>

    <!-- tentang section -->
    <section id="tentang" class="py-5 bg-white">
        <div class="container">
            <div class="row align-items-center g-5">

                <!-- Gambar -->
                <div class="col-lg-6 text-center" data-aos="fade-up"  data-aos-duration="1000">
                    <img src="{{ asset('asset/image/homePage.png') }}" alt="Tentang Kami" class="img-fluid animation">
                </div>

                <!-- Konten -->
                <div class="col-lg-6" data-aos="fade-up-left"  data-aos-duration="1000">
                    <h2 class="fw-bold mb-3 text-primary">Tentang Aplikasi</h2>
                    <p class="lead text-muted">
                        <strong class="app-title">E-ABSENSI</strong> hadir untuk menjawab kebutuhan sekolah di era digital.
                        Aplikasi ini memudahkan proses pencatatan kehadiran secara <span class="highlight">praktis</span>
                        dan <span class="highlight">efisien</span>.
                    </p>
                    <p class="text-muted">
                        Dengan tampilan modern dan sistem yang terintegrasi, guru, siswa, dan admin dapat mengakses data
                        absensi <strong>kapan saja</strong>, <strong>di mana saja</strong>.
                    </p>

                    <ul class="list-unstyled feature-list">
                        <li><i class="bi bi-pencil-square text-primary"></i> Pencatatan lebih akurat dan real-time</li>
                        <li><i class="bi bi-globe text-success"></i> Bisa diakses dari berbagai perangkat</li>
                        <li><i class="bi bi-bar-chart-line text-warning"></i> Laporan absensi otomatis & efisien</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <!-- manfaat section -->
    <section id="manfaat" class="py-5 bg-light">
        <div class="container"  data-aos="fade-down-left" data-aos-duration="1000">
            <h2 class="text-center fw-bold text-primary mb-5">Manfaat Dari Aplikasi <span class="highlight">E-ABSENSI</span>
            </h2>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 manfaat-card">
                        <div class="card-body text-center">
                            <div class="icon-box bg-primary text-white mb-3">
                                <i class="bi bi-person-badge"></i>
                            </div>
                            <h5 class="card-title fw-bold">Untuk Guru</h5>
                            <ul class="list-unstyled mt-3 text-muted text-start">
                                <li>✅ Mencatat kehadiran lebih cepat</li>
                                <li>✅ Memantau siswa absen langsung</li>
                                <li>✅ Akses laporan setiap saat</li>
                                <li>✅ Penghematan waktu</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 manfaat-card">
                        <div class="card-body text-center">
                            <div class="icon-box bg-success text-white mb-3">
                                <i class="bi bi-mortarboard"></i>
                            </div>
                            <h5 class="card-title fw-bold">Untuk Siswa</h5>
                            <ul class="list-unstyled mt-3 text-muted text-start">
                                <li>✅ Tahu kehadiran sendiri</li>
                                <li>✅ Tidak bisa titip absen</li>
                                <li>✅ Bisa cek riwayat kehadiran</li>
                                <li>✅ Mudah saat daring/luring</li>
                                <li>✅ Lebih transparan</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 manfaat-card">
                        <div class="card-body text-center">
                            <div class="icon-box bg-warning text-white mb-3">
                                <i class="bi bi-building"></i>
                            </div>
                            <h5 class="card-title fw-bold">Untuk Sekolah</h5>
                            <ul class="list-unstyled mt-3 text-muted text-start">
                                <li>✅ Data terpusat & aman</li>
                                <li>✅ Meningkatkan kedisiplinan</li>
                                <li>✅ Monitoring realtime</li>
                                <li>✅ Modernisasi sistem</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center g-4 mt-3">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 manfaat-card">
                        <div class="card-body text-center">
                            <div class="icon-box bg-info text-white mb-3">
                                <i class="bi bi-people"></i>
                            </div>
                            <h5 class="card-title fw-bold">Untuk Orang Tua</h5>
                            <ul class="list-unstyled mt-3 text-muted text-start">
                                <li>✅ Memantau kehadiran anak</li>
                                <li>✅ Dapat notifikasi langsung</li>
                                <li>✅ Bisa diakses dari rumah</li>
                                <li>✅ Menumbuhkan disiplin</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 manfaat-card">
                        <div class="card-body text-center">
                            <div class="icon-box bg-danger text-white mb-3">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <h5 class="card-title fw-bold">Untuk Admin</h5>
                            <ul class="list-unstyled mt-3 text-muted text-start">
                                <li>✅ Kelola semua akun</li>
                                <li>✅ Jadwal & data kelas rapi</li>
                                <li>✅ Backup otomatis</li>
                                <li>✅ Sistem terkontrol</li>
                                <li>✅ Kendali penuh</li>
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
            <!-- Judul -->
            <div class="text-center mb-5">
                <h6 class="fw-semibold text-primary">Kontak Kami</h6>
                <h2 class="fw-bold text-dark">Temukan Kami di Bawah</h2>
                <p class="text-muted">Kami siap membantu Anda. Hubungi kami atau kunjungi lokasi kami.</p>
            </div>

            <div class="row g-4 align-items-center" data-aos="fade-up-right" data-aos-duration="1000">
                <!-- Info Kontak -->
                <div class="col-lg-5">
                    <div class="p-4 bg-white shadow rounded">
                        <ul class="list-unstyled fs-6 mb-0">
                            <li class="mb-4 d-flex align-items-center">
                                <i class="fa-solid fa-location-dot text-primary fs-4 me-3"></i>
                                <div>
                                    <strong class="d-block">Location:</strong>
                                    Boyolali, Jawa Tengah
                                </div>
                            </li>
                            <li class="mb-4 d-flex align-items-center">
                                <i class="fa-solid fa-phone text-primary fs-4 me-3"></i>
                                <div>
                                    <strong class="d-block">Phone:</strong>
                                    +62 822 2010 2177
                                </div>
                            </li>
                            <li class="mb-4 d-flex align-items-center">
                                <i class="fa-solid fa-envelope text-primary fs-4 me-3"></i>
                                <div>
                                    <strong class="d-block">Email:</strong>
                                    admin@eabsensi.id
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="fa-brands fa-instagram text-primary fs-4 me-3"></i>
                                <div>
                                    <strong class="d-block">Instagram:</strong>
                                    @eabsensi.id
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Peta -->
                <div class="col-lg-7" data-aos="fade-up-left" data-aos-duration="1000">
                    <div class="ratio ratio-16x9 shadow rounded overflow-hidden">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.4065668674734!2d110.59646000000001!3d-7.5305572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a6eb6fddaa7bb%3A0x94f51cc0049817d8!2sSMK%20Muhammadiyah%204%20Boyolali!5e0!3m2!1sid!2sid!4v1752721886853!5m2!1sid!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
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
