    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Absensi Sekolah</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <!-- Swiper CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <style>
            * {
                box-sizing: border-box;
            }

            html,
            body {
                max-width: 100%;
                overflow-x: hidden;
                font-family: "Poppins", sans-serif;
            }

            /* Navigation */
            .glass-navbar {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(8px);
                -webkit-backdrop-filter: blur(8px);
                transition: all 0.3s ease-in-out;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            }

            .glass-navbar .navbar-brand {
                color: #007bff !important;
                font-weight: 700;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .glass-navbar .navbar-brand img {
                height: 45px;
                width: auto;
            }

            .glass-navbar .nav-link {
                position: relative;
                color: #000;
                transition: color 0.3s ease;
            }

            .glass-navbar .nav-link::after {
                content: "";
                position: absolute;
                width: 0;
                height: 2px;
                left: 50%;
                bottom: 0;
                background-color: #007bff;
                transition: all 0.3s ease;
                transform: translateX(-50%);
            }

            .glass-navbar .nav-link:hover {
                color: #007bff;
            }

            .glass-navbar .nav-link:hover::after {
                width: 100%;
            }

            .btn-login {
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 6px;
                padding: 6px 18px;
                font-weight: 600;
                transition: background 0.3s ease-in-out;
            }

            .btn-login:hover {
                background-color: #0056d2;
                color: #fff;
            }

            .navbar-toggler {
                border: none;
            }

            .navbar-toggler:focus {
                box-shadow: none;
            }

            /* Hero Section */
            .hero {
                min-height: 100vh;
                background: linear-gradient(to right, #cfe8ff, #eaf4ff);
                display: flex;
                align-items: center;
            }

            .hero h1 {
                font-weight: bolder;
                line-height: 1.3;
            }

            .hero .highlight-2 {
                color: #0056b3;
            }

            .hero p {
                color: #6c757d;
                font-size: 1.1rem;
            }

            .hero .btn-primary {
                background-color: #007bff;
                border: none;
                transition: all 0.3s ease;
            }

            .hero .btn-primary:hover {
                background-color: #0056b3;
                transform: translateY(-2px);
            }

            .hero-img {
                max-height: 650px;
                animation: float 3s ease-in-out infinite;
            }

            /* Keunggulan Section */
            .feature-card {
                border-radius: 20px;
                padding: 30px;
                transition: all 0.3s ease;
                text-align: center;
                background-color: #ffffff;
            }

            .feature-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            }

            .feature-icon {
                font-size: 2.5rem;
                color: #0056b3;
                margin-bottom: 15px;
            }

            .section-title {
                color: #0056b3;
                font-weight: 700;
            }

            /* Tentang Kami Section */
            .tentang {
                background: linear-gradient(to right, #cfe8ff, #eaf4ff);
            }

            .tentang .section-title {
                color: #007bff;
                font-weight: 700;
            }

            .tentang-img {
                max-width: 400px;
                border-radius: 20px;
                transition: all 0.4s ease;
            }

            .tentang-img:hover {
                transform: scale(1.03);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            }

            .tentang .btn-primary {
                background-color: #007bff;
                border: none;
                transition: all 0.3s ease;
            }

            .tentang .btn-primary:hover {
                background-color: #0056b3;
                transform: translateY(-2px);
            }

            /* testimoni */
            .testimonial-card {
                background: #ffffff;
                border-radius: 25px;
                padding: 45px 40px;
                max-width: 650px;
                margin: 0 auto;
                position: relative;
                transition: all 0.4s ease;
            }

            .testimonial-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 35px rgba(0, 123, 255, 0.15);
            }

            .quote-icon {
                font-size: 2.5rem;
                color: #0056b3;
                opacity: 0.8;
            }

            .custom-nav {
                color: #0056b3;
                transition: 0.3s;
            }

            .swiper-pagination-bullet {
                background: #0056b3;
                opacity: 0.3;
                transition: 0.3s;
            }

            .swiper-pagination-bullet-active {
                opacity: 1;
                width: 25px;
                border-radius: 10px;
            }

            /* FAQ Section */
            #faq .accordion-button {
                background-color: #ffffff;
                border-radius: 10px !important;
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
                transition: all 0.3s ease;
            }

            #faq .accordion-button:not(.collapsed) {
                color: #0d6efd;
                background-color: #e9f3ff;
                box-shadow: 0 4px 12px rgba(13, 110, 253, 0.1);
            }

            #faq .accordion-button:focus {
                box-shadow: none;
            }

            #faq .accordion-body {
                background: #ffffff;
                border-radius: 0 0 10px 10px;
            }

            #faq .accordion-item {
                overflow: hidden;
                border: 1px solid #e1e1e1;
            }

            /* WhatsApp Floating Button */
            .whatsapp-float {
                position: fixed;
                width: 55px;
                height: 55px;
                background: #25d366;
                color: white;
                border-radius: 50%;
                bottom: 25px;
                left: 25px;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 28px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                transition: all 0.3s ease;
                z-index: 1000;
            }

            .whatsapp-float:hover {
                transform: scale(1.1);
                background: #1ebe5c;
            }

            .scroll-top-progress {
                position: fixed;
                bottom: 25px;
                right: 25px;
                width: 60px;
                height: 60px;
                border: none;
                border-radius: 50%;
                background: white;
                color: #007bff;
                display: none;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
                z-index: 1000;
                transition: all 0.3s ease;
            }

            .scroll-top-progress:hover {
                background: #007bff;
                color: white;
            }

            .scroll-top-progress i {
                font-size: 20px;
                position: absolute;
            }

            /* Progress Lingkaran */
            .progress-ring {
                position: absolute;
                transform: rotate(-90deg);
            }

            .progress-ring__circle {
                transition: stroke-dashoffset 0.25s;
                stroke-linecap: round;
            }

            .footer {
                background: #0d1b2a;
                color: #ddd;
                border-top: 4px solid #007bff;
            }

            .footer-link {
                color: #fff;
                text-decoration: none;
                transition: color 0.3s ease;
            }

            .footer-link:hover {
                color: #007bff;
                text-decoration: underline;
            }

            .social-icons .social-link {
                color: #007bff;
                font-size: 1.2rem;
                margin-right: 12px;
                transition: all 0.3s ease;
            }

            .social-icons .social-link:hover {
                color: #007bff;
                transform: translateY(-3px);
            }

            @media (max-width: 768px) {
                .tentang {
                    text-align: center;
                }

                .tentang ul {
                    text-align: left;
                    display: inline-block;
                }
            }

            @media (max-width: 768px) {
                .feature-card {
                    padding: 20px;
                }
            }

            @media (max-width: 991px) {
                .navbar-nav {
                    background-color: #fff;
                    border-radius: 10px;
                    padding: 10px 0;
                }
            }

            @media (max-width: 768px) {
                .glass-navbar .nav-link:hover::after {
                    width: 40%;
                }
            }
        </style>
    </head>

    <body>
        <!-- Navbar -->
        <nav id="navbar" class="navbar navbar-expand-lg fixed-top py-1 glass-navbar">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand fw-bold" href="#">
                    <img src="{{ asset('asset/image/logoSmk-removebg-preview (1).png') }}" alt="Logo Sekolah">
                    <span class="fs-5">E-Absensi</span>
                </a>

                <!-- Toggle button (mobile) -->
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars fs-3 text-primary"></i>
                </button>

                <!-- Menu -->
                <div class="collapse navbar-collapse justify-content-end mt-3 mt-lg-0" id="navbarNav">
                    <ul class="navbar-nav me-3 text-center align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="#">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="#tentang">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="#faq">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="#kontak">Kontak</a>
                        </li>
                        <li class="nav-item ms-lg-2">
                            <a href="login.html" class="btn btn-login">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="hero d-flex align-items-center py-5" id="hero">
            <div class="container">
                <div class="row align-items-center">

                    <!-- Left Content -->
                    <div class="col-lg-6 text-center text-lg-start" data-aos="fade-up-right" data-aos-duration="1000">
                        <h1 class="fw-bold display-5 text-dark">
                            Sistem Absensi Digital
                            yang <span class="highlight-2">Modern & Efisien</span>
                        </h1>

                        <p class="mt-3 text-secondary">
                            Kelola kehadiran siswa dengan mudah dan cepat. Sistem absensi sekolah berbasis digital yang
                            akurat,
                            efisien, dan aman digunakan kapan pun.
                        </p>

                        <a href="#mulai" class="btn btn-primary px-4 py-2 mt-3 fw-semibold rounded-pill shadow">
                            Mulai Sekarang
                        </a>
                    </div>

                    <!-- Right Image -->
                    <div class="col-lg-6 text-center mt-4 mt-lg-0" data-aos="fade-up-left" data-aos-duration="1000">
                        <img src="{{ asset('asset/image/college project-rafiki.png') }}" alt="Absensi Digital"
                            class="img-fluid hero-img">
                    </div>

                </div>
            </div>
        </section>

        <!-- Section Keunggulan -->
        <section class="py-5 my-5" id="keunggulan">
            <div class="container text-center" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="section-title">KEUNGGULAN SISTEM KAMI</h2>
                <p class="text-muted mb-5">
                    Sistem absensi digital dirancang untuk meningkatkan efisiensi, akurasi, dan kenyamanan
                    dalam mencatat kehadiran siswa di sekolah.
                </p>

                <div class="row g-4">
                    <!-- Real-Time -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card feature-card shadow-sm h-100">
                            <div class="feature-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <h5 class="fw-bold">REAL-TIME</h5>
                            <p class="text-muted">
                                Data kehadiran langsung tercatat dan dapat diakses oleh guru maupun admin sekolah secara
                                waktu nyata.
                            </p>
                        </div>
                    </div>

                    <!-- Akurat -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card feature-card shadow-sm h-100">
                            <div class="feature-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <h5 class="fw-bold">AKURAT</h5>
                            <p class="text-muted">
                                Sistem kami meminimalisir kesalahan pencatatan sehingga data absensi lebih valid dan
                                terpercaya.
                            </p>
                        </div>
                    </div>

                    <!-- Aman -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card feature-card shadow-sm h-100">
                            <div class="feature-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <h5 class="fw-bold">AMAN</h5>
                            <p class="text-muted">
                                Setiap data tersimpan dengan sistem keamanan berlapis untuk melindungi privasi sekolah
                                dan siswa.
                            </p>
                        </div>
                    </div>

                    <!-- Mudah Digunakan -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card feature-card shadow-sm h-100">
                            <div class="feature-icon">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <h5 class="fw-bold">MUDAH DIGUNAKAN</h5>
                            <p class="text-muted">
                                Tampilan antarmuka yang sederhana dan responsif, sehingga mudah digunakan oleh guru dan
                                siswa.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Tentang Kami -->
        <section class="tentang py-5 my-5" id="tentang">
            <div class="container">
                <div class="row align-items-center">

                    <!-- Gambar -->
                    <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                        <img src="{{ asset('asset/image/Teaching-rafiki.png') }}" alt="Tentang Kami"
                            class="img-fluid rounded shadow tentang-img">
                    </div>

                    <!-- Teks -->
                    <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                        <h2 class="section-title mb-3">TENTANG KAMI</h2>
                        <p class="text-secondary mb-4">
                            <strong>AbsensiSekolah</strong> adalah platform absensi digital yang dirancang khusus untuk
                            membantu sekolah
                            dalam mencatat kehadiran siswa secara lebih cepat, akurat, dan efisien. Dengan sistem ini,
                            guru dan pihak sekolah
                            dapat memantau data kehadiran secara real-time tanpa proses manual yang memakan waktu.
                        </p>
                        <a href="#keunggulan" class="btn btn-primary mt-3 px-4 py-2 rounded-pill shadow fw-semibold">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>

                </div>
            </div>
        </section>

        <!-- Section Testimoni -->
        <section id="testimoni" class="py-5" style="background: linear-gradient(180deg, #ffffff, #eaf2ff);">
            <div class="container text-center" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="fw-bold mb-3 text-primary">Apa Kata Mereka?</h2>
                <p class="text-muted mb-5">Pendapat guru dan siswa tentang sistem absensi digital sekolah kami.</p>

                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">

                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <div class="testimonial-card shadow-lg" data-aos="fade-up">
                                <div class="quote-icon mb-3"><i class="fa-solid fa-quote-left"></i></div>
                                <p class="fst-italic text-muted">
                                    “Sistem absensi ini benar-benar memudahkan guru dan siswa. Semua jadi otomatis dan
                                    rapi!”
                                </p>
                                <h5 class="fw-semibold text-primary mt-3">Bu Rina</h5>
                                <small class="text-secondary">Guru BK - SMA Harapan Bangsa</small>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="swiper-slide">
                            <div class="testimonial-card shadow-lg" data-aos="fade-up">
                                <div class="quote-icon mb-3"><i class="fa-solid fa-quote-left"></i></div>
                                <p class="fst-italic text-muted">
                                    “Sekarang absensi nggak perlu manual. Hasilnya langsung muncul di dashboard
                                    sekolah.”
                                </p>
                                <h5 class="fw-semibold text-primary mt-3">Andi Pratama</h5>
                                <small class="text-secondary">Siswa Kelas 11 IPA</small>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="swiper-slide">
                            <div class="testimonial-card shadow-lg" data-aos="fade-up">
                                <div class="quote-icon mb-3"><i class="fa-solid fa-quote-left"></i></div>
                                <p class="fst-italic text-muted">
                                    “Dashboard-nya simpel, datanya akurat, dan mudah dipantau. Sangat direkomendasikan!”
                                </p>
                                <h5 class="fw-semibold text-primary mt-3">Pak Dedi</h5>
                                <small class="text-secondary">Kepala Sekolah - SMP Negeri 2</small>
                            </div>
                        </div>

                    </div>

                    <!-- Panah Navigasi -->
                    <div class="swiper-button-prev custom-nav"></div>
                    <div class="swiper-button-next custom-nav"></div>

                    <!-- Dot Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faq" class="py-5" style="background-color: #f8faff;">
            <div class="container" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-center fw-bold mb-4 text-primary">Pertanyaan yang Sering Diajukan</h2>
                <p class="text-center text-muted mb-5">Temukan jawaban dari pertanyaan umum seputar sistem absensi
                    sekolah digital kami.</p>

                <div class="accordion" id="faqAccordion">
                    <!-- Item 1 -->
                    <div class="accordion-item shadow-sm mb-3 rounded-3 border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-semibold text-dark" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true">
                                Bagaimana cara siswa melakukan absensi?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Siswa cukup login ke sistem absensi, lalu klik tombol “Absen Sekarang”. Sistem akan
                                otomatis mencatat waktu dan lokasi absensi.
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="accordion-item shadow-sm mb-3 rounded-3 border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold text-dark" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faq2">
                                Apakah orang tua bisa memantau absensi siswa?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Ya, orang tua dapat mengakses dashboard khusus untuk melihat riwayat absensi,
                                keterlambatan, dan kehadiran siswa setiap hari.
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="accordion-item shadow-sm mb-3 rounded-3 border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold text-dark" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faq3">
                                Apakah sistem ini bisa diakses lewat HP?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Bisa banget! Sistem absensi sekolah ini sudah mendukung tampilan mobile dan bisa diakses
                                lewat browser HP.
                            </div>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="accordion-item shadow-sm mb-3 rounded-3 border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold text-dark" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faq4">
                                Bagaimana jika siswa lupa absen?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Jika siswa lupa absen, guru wali kelas dapat mengonfirmasi kehadiran secara manual
                                melalui panel admin sekolah.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Kontak Kami -->
        <section class="social-location py-5" id="kontak" style="background-color: #f8f9fa;">
            <div class="container">

                <!-- Title Section -->
                <div class="text-center mb-5" data-aos="fade-down" data-aos-duration="1000">
                    <h2 class="fw-bold text-primary">KONTAK KAMI</h2>
                    <p class="text-secondary mt-2">
                        Tetap terhubung dengan kami melalui media sosial atau kunjungi lokasi kami secara langsung.
                    </p>
                </div>

                <div class="row align-items-center">

                    <!-- Kiri: Sosial Media -->
                    <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                        <h3 class="fw-bold text-primary mb-3">Ikuti Kami</h3>
                        <p class="text-secondary mb-4">
                            Terhubung dengan kami melalui media sosial untuk mendapatkan update terbaru.
                        </p>

                        <div class="d-flex justify-content flex-wrap gap-3">
                            <a href="https://github.com/" target="_blank" class="text-dark fs-3">
                                <i class="bi bi-github"></i>
                            </a>
                            <a href="https://instagram.com/" target="_blank" class="text-danger fs-3">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="https://facebook.com/" target="_blank" class="text-primary fs-3">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://linkedin.com/" target="_blank" class="text-info fs-3">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Kanan: Lokasi -->
                    <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                        <div class="ratio ratio-16x9 rounded shadow">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.047857671205!2d110.41082427422147!3d-7.888378778566598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a57df08d6ab3d%3A0x4e4f9f47d6a09a!2sUniversitas%20Dian%20Nuswantoro!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <footer class="footer py-5 mt-5">
            <div class="container">
                <div class="row g-4">
                    <!-- Kolom 1 -->
                    <div class="col-md-4">
                        <h5 class="fw-bold text-white mb-3">SMA MUHAMMADIYAH 04 BOYOLALI</h5>
                        <p class="text-white small">
                            Membangun generasi unggul, berkarakter, dan siap menghadapi masa depan dengan ilmu dan
                            integritas.
                        </p>
                    </div>

                    <!-- Kolom 2 -->
                    <div class="col-md-4">
                        <h6 class="fw-bold text-white mb-3">Navigasi</h6>
                        <ul class="list-unstyled">
                            <li><a href="#home" class="footer-link">Beranda</a></li>
                            <li><a href="#tentang" class="footer-link">Tentang Kami</a></li>
                            <li><a href="#program" class="footer-link">Program</a></li>
                            <li><a href="#kontak" class="footer-link">Kontak</a></li>
                        </ul>
                    </div>

                    <!-- Kolom 3 -->
                    <div class="col-md-4">
                        <h6 class="fw-bold text-white mb-3">Hubungi Kami</h6>
                        <p class="text-white small mb-1"><i class="fas fa-map-marker-alt me-2"></i>Jl. Lembayung No. 4, Pulisen, Boyolali</p>
                        <p class="text-white small mb-1"><i class="fas fa-phone me-2"></i>(021) 1234 5678</p>
                        <p class="text-white small"><i class="fas fa-envelope me-2"></i>info@smkmuh4byl.sch.id</p>

                        <div class="social-icons mt-3">
                            <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>

                <hr class="mt-5 mb-3 text-white-50">
                <div class="text-center text-white small">
                    © 2025 SMK Muhammadiyah 04 Boyolali. All rights reserved.
                </div>
            </div>
        </footer>

        <!-- Floating WhatsApp -->
        <a href="https://wa.me/6281234567890" target="_blank" class="whatsapp-float"
            title="Hubungi kami di WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>

        <!-- Scroll to Top (dengan progress di ikon) -->
        <button id="scrollTopBtn" class="scroll-top-progress">
            <svg class="progress-ring" width="60" height="60">
                <circle class="progress-ring__circle" stroke="#007bff" stroke-width="4" fill="transparent" r="26"
                    cx="30" cy="30" />
            </svg>
            <i class="fas fa-chevron-up"></i>
        </button>



        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            var swiper = new Swiper(".mySwiper", {
                loop: true,
                grabCursor: true,
                centeredSlides: true,
                autoplay: {
                    delay: 3500, // tiap 3.5 detik baru ganti
                    disableOnInteraction: false,
                },
                effect: "slide",
                speed: 800, // animasi gesernya lebih halus
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
            const scrollBtn = document.getElementById("scrollTopBtn");
            const circle = document.querySelector(".progress-ring__circle");

            const radius = circle.r.baseVal.value;
            const circumference = 2 * Math.PI * radius;
            circle.style.strokeDasharray = `${circumference} ${circumference}`;
            circle.style.strokeDashoffset = circumference;

            // Fungsi update progress
            function setProgress(percent) {
                const offset = circumference - (percent / 100) * circumference;
                circle.style.strokeDashoffset = offset;
            }

            window.addEventListener("scroll", () => {
                const scrollTop = document.documentElement.scrollTop;
                const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrollPercent = (scrollTop / scrollHeight) * 100;

                setProgress(scrollPercent);

                // Tampilkan tombol saat user scroll 200px ke bawah
                if (scrollTop > 200) {
                    scrollBtn.style.display = "flex";
                } else {
                    scrollBtn.style.display = "none";
                }
            });

            // Klik untuk ke atas
            scrollBtn.addEventListener("click", () => {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            });
        </script>
    </body>

    </html>
