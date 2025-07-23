@extends('layout.layout')

@section('content')
    <style>
        * {
            box-sizing: border-box;
            max-width: 100%;
        }

        .container,
        .row {
            margin-left: auto;
            margin-right: auto;
            padding-left: 15px;
            padding-right: 15px;
            overflow-x: hidden;
        }
    </style>

    <!-- navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold " href="#hero">E-Absensi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#hero">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#manfaat">Manfaat</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    <li class="nav-item me-2">
                        <a href="{{ route('login.index') }}" class="btn btn-primary">Login</a>
                    </li>
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
            <div class="row align-items-center g-5" style="overflow-y: hidden">
                <!-- Gambar -->
                <div class="col-lg-6 text-center" data-aos="fade-up" data-aos-duration="1000">
                    <img src="{{ asset('asset/image/homePage.png') }}" alt="Tentang Kami"
                        class="img-fluid rounded animation">
                </div>

                <!-- Konten -->
                <div class="col-lg-6" data-aos="fade-up-left" data-aos-duration="1000">
                    <h2 class="fw-bold mb-3 text-primary">
                        Tentang Kami
                    </h2>
                    <p class="lead text-muted">
                        <strong class="app-title text-dark">E-ABSENSI</strong> adalah solusi modern untuk mencatat
                        kehadiran di era digital. Aplikasi ini dirancang agar proses absensi menjadi
                        <span class="fw-bold text-dark">lebih praktis</span> dan
                        <span class="fw-bold text-dark">lebih efisien</span>.
                    </p>
                    <p class="text-muted mb-4">
                        Dengan tampilan modern dan sistem yang terintegrasi, guru, siswa, dan admin dapat mengakses data
                        kehadiran <span class="fw-semibold">kapan saja</span> dan <span class="fw-semibold">di mana
                            saja</span>
                        tanpa hambatan.
                    </p>

                    <div class="row g-3">
                        <div class="col-12 col-md-6 d-flex align-items-start">
                            <i class="bi bi-pencil-square text-primary fs-3 me-3"></i>
                            <span>Pencatatan lebih akurat dan real-time</span>
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-start">
                            <i class="bi bi-globe text-success fs-3 me-3"></i>
                            <span>Bisa diakses dari berbagai perangkat</span>
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-start">
                            <i class="bi bi-bar-chart-line text-warning fs-3 me-3"></i>
                            <span>Laporan absensi otomatis & efisien</span>
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-start">
                            <i class="bi bi-shield-lock text-danger fs-3 me-3"></i>
                            <span>Data absensi lebih aman</span>
                        </div>
                    </div>

                    <a href="#manfaat" class="btn btn-primary mt-4 px-4">
                        Pelajari Lebih Lanjut <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>



    <!-- manfaat section -->
    <section id="manfaat" class="py-5" style="background: linear-gradient(135deg, #f8f9fa, #eef5ff);">
        <div class="container" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-center fw-bold text-primary mb-4">
                Manfaat <span class="text-dark">E-ABSENSI</span>
            </h2>
            <p class="text-center text-muted mb-5">
                E-ABSENSI memberikan kemudahan bagi semua pihak. Berikut manfaat yang bisa dirasakan:
            </p>

            <div class="row g-4">
                <!-- Untuk Guru -->
                <div class="col-sm-6 col-lg-4">
                    <div class="card h-100 shadow border-0 manfaat-card text-center p-3 hover-card">
                        <div class="icon-box mx-auto bg-primary text-white mb-3 rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 70px; height: 70px;">
                            <i class="bi bi-person-badge fs-2"></i>
                        </div>
                        <h5 class="fw-bold">Untuk Guru</h5>
                        <p class="text-muted small">Mempermudah pengelolaan absensi harian siswa.</p>
                        <ul class="list-unstyled text-muted text-start mt-3">
                            <li>✅ Mencatat kehadiran lebih cepat</li>
                            <li>✅ Memantau siswa absen langsung</li>
                            <li>✅ Akses laporan setiap saat</li>
                            <li>✅ Penghematan waktu</li>
                        </ul>
                    </div>
                </div>

                <!-- Untuk Siswa -->
                <div class="col-sm-6 col-lg-4">
                    <div class="card h-100 shadow border-0 manfaat-card text-center p-3 hover-card">
                        <div class="icon-box mx-auto bg-success text-white mb-3 rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 70px; height: 70px;">
                            <i class="bi bi-mortarboard fs-2"></i>
                        </div>
                        <h5 class="fw-bold">Untuk Siswa</h5>
                        <p class="text-muted small">Transparansi kehadiran lebih jelas.</p>
                        <ul class="list-unstyled text-muted text-start mt-3">
                            <li>✅ Tahu kehadiran sendiri</li>
                            <li>✅ Tidak bisa titip absen</li>
                            <li>✅ Bisa cek riwayat kehadiran</li>
                            <li>✅ Mudah saat daring/luring</li>
                        </ul>
                    </div>
                </div>

                <!-- Untuk Sekolah -->
                <div class="col-sm-6 col-lg-4">
                    <div class="card h-100 shadow border-0 manfaat-card text-center p-3 hover-card">
                        <div class="icon-box mx-auto bg-warning text-white mb-3 rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 70px; height: 70px;">
                            <i class="bi bi-building fs-2"></i>
                        </div>
                        <h5 class="fw-bold">Untuk Sekolah</h5>
                        <p class="text-muted small">Data terpusat untuk administrasi yang lebih baik.</p>
                        <ul class="list-unstyled text-muted text-start mt-3">
                            <li>✅ Data terpusat & aman</li>
                            <li>✅ Meningkatkan kedisiplinan</li>
                            <li>✅ Monitoring realtime</li>
                            <li>✅ Modernisasi sistem</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Untuk Orang Tua & Admin -->
            <div class="row justify-content-center g-4 mt-3">
                <div class="col-sm-6 col-lg-4">
                    <div class="card h-100 shadow border-0 manfaat-card text-center p-3 hover-card">
                        <div class="icon-box mx-auto bg-info text-white mb-3 rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 70px; height: 70px;">
                            <i class="bi bi-people fs-2"></i>
                        </div>
                        <h5 class="fw-bold">Untuk Orang Tua</h5>
                        <p class="text-muted small">Pantau kehadiran anak dengan mudah.</p>
                        <ul class="list-unstyled text-muted text-start mt-3">
                            <li>✅ Memantau kehadiran anak</li>
                            <li>✅ Dapat notifikasi langsung</li>
                            <li>✅ Bisa diakses dari rumah</li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card h-100 shadow border-0 manfaat-card text-center p-3 hover-card">
                        <div class="icon-box mx-auto bg-danger text-white mb-3 rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 70px; height: 70px;">
                            <i class="bi bi-shield-lock fs-2"></i>
                        </div>
                        <h5 class="fw-bold">Untuk Admin</h5>
                        <p class="text-muted small">Kendali penuh terhadap sistem absensi.</p>
                        <ul class="list-unstyled text-muted text-start mt-3">
                            <li>✅ Kelola semua akun</li>
                            <li>✅ Jadwal & data kelas rapi</li>
                            <li>✅ Backup otomatis</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- kontak section -->
    <section id="kontak" class="py-5" style="background: linear-gradient(135deg, #f8f9fa, #eef5ff);">
        <div class="container" style="overflow-y: hidden">
            <!-- Judul -->
            <div class="text-center mb-5">
                <h6 class="fw-semibold text-primary">Kontak Kami</h6>
                <h2 class="fw-bold text-dark position-relative d-inline-block">
                    Temukan Kami
                    <span class="d-block mx-auto mt-2" style="width: 50px; height: 3px; background: #007bff;"></span>
                </h2>
                <p class="text-muted mt-2">Kami siap membantu Anda. Hubungi kami atau kunjungi lokasi kami.</p>
            </div>

            <div class="row g-4 align-items-start" data-aos="fade-up" data-aos-duration="1000">
                <!-- Info Kontak -->
                <div class="col-lg-5">
                    <div class="p-4 bg-white shadow rounded h-100">
                        <ul class="list-unstyled fs-6 mb-0">
                            <li class="mb-4 d-flex align-items-center">
                                <i class="fa-solid fa-location-dot contact-icon"></i>
                                <div>
                                    <strong class="d-block">Location:</strong>
                                    Boyolali, Jawa Tengah
                                </div>
                            </li>
                            <li class="mb-4 d-flex align-items-center">
                                <i class="fa-solid fa-phone contact-icon"></i>
                                <div>
                                    <strong class="d-block">Phone:</strong>
                                    +62 822 2010 2177
                                </div>
                            </li>
                            <li class="mb-4 d-flex align-items-center">
                                <i class="fa-solid fa-envelope contact-icon"></i>
                                <div>
                                    <strong class="d-block">Email:</strong>
                                    admin@eabsensi.id
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="fa-brands fa-instagram contact-icon"></i>
                                <div>
                                    <strong class="d-block">Instagram:</strong>
                                    @eabsensi.id
                                </div>
                            </li>
                        </ul>
                        <a href="https://wa.me/6285728826546" class="btn btn-success w-100 mt-3" target="_blank">
                            <i class="bi bi-whatsapp"></i> Hubungi via WhatsApp
                        </a>
                    </div>
                </div>

                <!-- Peta + Form -->
                <div class="col-lg-7">
                    <div class="ratio ratio-16x9 shadow rounded overflow-hidden mb-3">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.4065668674734!2d110.59646000000001!3d-7.5305572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a6eb6fddaa7bb%3A0x94f51cc0049817d8!2sSMK%20Muhammadiyah%204%20Boyolali!5e0!3m2!1sid!2sid!4v1752721886853!5m2!1sid!2sid"
                            style="border:0; filter: grayscale(20%);" allowfullscreen loading="lazy"></iframe>
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

    <!-- Tombol Scroll to Top -->
    <button onclick="window.scrollTo({top:0, behavior:'smooth'})"
        style="bottom:20px; right:20px;" class="btn btn-primary rounded-circle position-fixed">
        <i class="bi bi-arrow-up"></i>
    </button>
@endsection
