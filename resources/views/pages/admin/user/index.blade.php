{{-- admin bisa membuat akun guru dan siswa --}}

@extends('layout.layout')

@section('content')
  <section>
        <div class="content pt-5 mt-4" id="mainContent">

             <h1 class="h3 mb-3">
                   <i class="fa-solid fa-user"></i> Data user
            </h1>


            <!-- Baris Atas: Tambah Data & Export -->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <a href="#" class="btn btn-primary">
                    + Tambah Data
                </a>
                <div>
                    <a href="#" class="btn btn-danger me-1">
                        <i class="bi bi-file-earmark-pdf-fill"></i> PDF
                    </a>
                    <a href="#" class="btn btn-success">
                        <i class="bi bi-file-earmark-excel-fill"></i> Excel
                    </a>
                </div>
            </div>

            <!-- Form Pencarian -->
            <div class="d-flex justify-content-end mb-3">
                <form class="d-flex" role="search" method="GET" action="#">
                    <input class="form-control me-2" type="search" name="search" placeholder="Cari Nama...."
                        aria-label="Search">
                    <button class="btn btn-primary " type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>

            <!-- Tabel Kehadiran -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-sm align-middle text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ahmad Yusuf</td>
                            <td>ahmad@example.com</td>
                            <td>Guru</td>
                            <td><span class="badge bg-success">Masuk</span></td>
                            <td>
                                <button class="btn btn-outline-warning me-1"><i
                                        class="fa-solid fa-pen-to-square"></i></button>
                                <button class="btn btn-outline-info me-1"><i class="fa-solid fa-circle-info"></i></button>
                                <button class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Siti Aminah</td>
                            <td>siti@example.com</td>
                            <td>Staff TU</td>
                            <td><span class="badge bg-warning text-dark">Izin</span></td>
                            <td>
                                <button class="btn btn-outline-warning me-1"><i
                                        class="fa-solid fa-pen-to-square"></i></button>
                                <button class="btn btn-outline-info me-1"><i class="fa-solid fa-circle-info"></i></button>
                                <button class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Rudi Hartono</td>
                            <td>rudi@example.com</td>
                            <td>Guru</td>
                            <td><span class="badge bg-danger">Sakit</span></td>
                            <td>
                                <button class="btn btn-outline-warning me-1"><i
                                        class="fa-solid fa-pen-to-square"></i></button>
                                <button class="btn btn-outline-info me-1"><i class="fa-solid fa-circle-info"></i></button>
                                <button class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Fairuz Aqila</td>
                            <td>fairuz@example.com</td>
                            <td>Siswa</td>
                            <td><span class="badge bg-secondary">Tanpa Keterangan</span></td>
                            <td>
                                <button class="btn btn-outline-warning me-1"><i
                                        class="fa-solid fa-pen-to-square"></i></button>
                                <button class="btn btn-outline-info me-1"><i class="fa-solid fa-circle-info"></i></button>
                                <button class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
