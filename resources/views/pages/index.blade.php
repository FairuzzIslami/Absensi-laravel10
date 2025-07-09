@extends('layout.layout')

@section('content')
    <section class="bg-light py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Selamat Datang di Aplikasi Kehadiran</h1>
            <p class="lead">Pantau, kelola, dan catat kehadiran dengan mudah dan cepat.</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <i class="fas fa-user-check fa-3x text-primary mb-3"></i>
                    <h4>Presensi Online</h4>
                    <p>Mencatat kehadiran siswa atau pegawai secara real-time dengan sistem yang praktis.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <i class="fas fa-chart-line fa-3x text-success mb-3"></i>
                    <h4>Data Statistik</h4>
                    <p>Lihat grafik dan laporan kehadiran dengan tampilan yang mudah dipahami.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <i class="fas fa-lock fa-3x text-danger mb-3"></i>
                    <h4>Keamanan Terjamin</h4>
                    <p>Data disimpan dengan aman dan hanya bisa diakses oleh pengguna yang berwenang.</p>
                </div>
            </div>
        </div>
    @endsection
