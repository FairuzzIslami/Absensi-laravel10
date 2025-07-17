@extends('layout.layout')

@section('content')
    <section>
        <!-- Konten Utama -->
        <section id="Konten">
            <div class="content pt-5 mt-4" id="mainContent">
                <h1 class="h4 mb-4">
                    <i class="fa-solid fa-gauge"></i> Dashboard Admin
                </h1>

                <div class="row g-3">
                    <!-- Card: Data Guru -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-primary shadow-sm border-0 p-3 text-center">
                            <i class="fa-solid fa-user-tie fa-2x mb-2"></i>
                            <h5 class="card-title">Data Guru</h5>
                            <h4 class="fw-bold">10</h4>
                        </div>
                    </div>

                    <!-- Card: Data Siswa -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-danger shadow-sm border-0 p-3 text-center">
                            <i class="fa-solid fa-user fa-2x mb-2"></i>
                            <h5 class="card-title">Data Siswa</h5>
                            <h4 class="fw-bold">20</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-warning shadow-sm border-0 p-3 text-center">
                            <i class="fa-solid fa-school fa-2x mb-2"></i>
                            <h5 class="card-title">Data Kelas</h5>
                            <h4 class="fw-bold">6</h4>
                        </div>
                    </div>
                </div>
            </div>


        </section>
    </section>
@endsection
