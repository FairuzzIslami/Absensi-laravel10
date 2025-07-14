@extends('layout.layout')

@section('content')
    <section>
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <!-- Logo -->
            <div class="d-flex align-items-center justify-content-center mb-3">
                <i class="fas fa-tasks me-2 fs-4"></i>
                <span class="fw-bold fs-5">Absensi Sekolah</span>
            </div>


            <hr class="border-light opacity-25 mx-3" />


            <a href="#" class="">
                <i class="fas fa-chart-line me-2"></i> Dashboard
            </a>


            <div class="text-white-50 text-uppercase">Menu Admin</div>
            <a href="#">
                <i class="fas fa-user me-2"></i> Buat Akun
            </a>
            <a href="#">
                <i class="fas fa-tasks me-2"></i> Data Kehadiran
            </a>

            <hr class="border-light opacity-25 mx-3" />

            <div class="text-white-50 text-uppercase">Menu Rekap Data</div>
            <a href="#">
                <i class="fas fa-user me-2"></i> Buat Kelas
            </a>
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-light bg-white shadow-sm fixed-top default" id="mainNavbar">
            <div class="container-fluid">

                <!-- Tombol Toggle Sidebar -->
                <button class="btn btn-outline-primary me-3" id="toggleSidebar">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <!-- Form Pencarian -->
                <form class="d-none d-sm-inline-block me-auto">
                    <div class="input-group search-input">
                        <input type="text" class="form-control form-control-sm" placeholder="Search..." />
                        <button class="btn btn-primary btn-sm" type="button">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>

                <!-- User Info -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                            data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i> Fairuz
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profil</a></li>
                            <li><a class="dropdown-item" href="#">Keluar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Konten Utama -->
        <div class="content pt-5 mt-4" id="mainContent">
            <h1 class="h4 mb-4">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </h1>

            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card p-3">
                        <h6>Earnings (Monthly)</h6>
                        <h4>$40,000</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
