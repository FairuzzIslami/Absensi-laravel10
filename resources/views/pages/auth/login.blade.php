@extends('layout.layout')

@section('content')
    <section class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-9">
                    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                        <div class="row g-0">
                            <!-- Gambar Samping -->
                            <div style="background-color: #0D5EA6 "
                                class="col-md-6 d-none d-md-block text-white text-center p-4">
                                <div class="d-flex flex-column justify-content-center h-100">
                                    <img src="{{ asset('asset/image/logoSmk.jpg') }}" alt="Logo"
                                        class="img-fluid rounded-circle mx-auto mb-3" style="width: 120px;">
                                    <h2 class="fw-bold">Absensi Harian</h2>
                                    <p class="small">SMK MUHAMMDIYAH 04 BOYOLALI</p>
                                </div>
                            </div>

                            <!-- Form Login -->
                            <div class="col-md-6 bg-white p-5">
                                <div class="text-center mb-4">
                                    <h4 class="fw-bold">FORM LOGIN ABSENSI</h4>
                                    <p class="text-muted small">Masukkan akun yang sudah terdaftar</p>
                                </div>

                                <form action="{{ route('auth.login') }}" method="POST">
                                    @csrf
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif


                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Masukkan email" name="email" value="{{ old('email') }}">
                                        </div>
                                        @error('email')
                                            <div class="text-danger small">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Masukkan password" name="password" required>
                                            <span class="input-group-text toggle-password">
                                                <i class="fa fa-eye"></i>
                                            </span>
                                        </div>
                                        @error('password')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" style="background-color: #0D5EA6"
                                        class="btn w-100 fw-bold text-white">Login</button>

                                    <p class="text-center mt-3 text-muted small">Belum punya akun? Hubungi
                                        <a class="user-select-none" style="text-decoration: none"
                                            href="https://api.whatsapp.com/send?phone=6285728826546">
                                            admin sekolah
                                        </a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
