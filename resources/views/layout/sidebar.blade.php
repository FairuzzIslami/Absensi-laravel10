<section id="">
    <div class="sidebar" id="sidebar">
        <!-- Logo -->
        <div class="d-flex align-items-center justify-content-center mb-4 flex-column">
            <img src="{{ asset('asset/image/logoSmk.jpg') }}" alt="Logo Sekolah" class="img-fluid rounded-circle mb-2"
                style="width: 60px; height: 60px; object-fit: cover;">
            <span class="fw-bold fs-5 text-white">Absensi Sekolah</span>
        </div>

        <hr class="border-light opacity-25 mx-3" />

        <!-- Menu Dashboard -->
        @if (auth()->user()->role->nama_role === 'admin')
            <a href="{{ route('admin.index') }}" class="sidebar-link">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>

            <!-- Menu Admin -->
            <div class="text-white-50 text-uppercase mt-3 mb-2 px-3 small">Menu Admin</div>
            <a href="{{ route('user.index') }}" class="sidebar-link">
                <i class="fas fa-users me-2"></i> Data User
            </a>
            <a href="{{ route('admin.kehadiran.index') }}" class="sidebar-link">
                <i class="fas fa-clipboard-check me-2"></i> Data Kehadiran
            </a>

            <div class="dropdown">
                <a class="sidebar-link dropdown-toggle text-white d-block mb-2" href="#" role="button"
                    id="dropdownKode" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-key me-2"></i> Kode Kehadiran
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownKode">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.kode.create') }}">
                            <i class="fas fa-plus me-2"></i> Buat Kode Baru
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('admin.kode.index')}}">
                            <i class="fas fa-list me-2"></i> Lihat Daftar Kode
                        </a>
                    </li>
                </ul>
            </div>


            <hr class="border-light opacity-25 mx-3" />

            <!-- Menu Rekap -->
            <div class="text-white-50 text-uppercase mt-3 mb-2 px-3 small">Manajemen Data</div>
            <a href="{{ route('kelas.index') }}" class="sidebar-link">
                <i class="fas fa-school me-2"></i> Buat Kelas
            </a>
            <a href="{{ route('jadwal.index') }}" class="sidebar-link">
                <i class="fa-solid fa-calendar-days me-2"></i> Jadwal Mengajar
            </a>

        @elseif(auth()->user()->role->nama_role === 'guru')
            <a href="{{ route('guru.index') }}" class="sidebar-link">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>

            <div class="text-white-50 text-uppercase mt-3 mb-2 px-3 small">Menu Guru</div>
            <a href="{{ route('guru.kelas') }}" class="sidebar-link">
                <i class="fas fa-door-open me-2"></i> Data Kelas
            </a>
            <a href="{{ route('guru.absensi') }}" class="sidebar-link">
                <i class="fas fa-user-check me-2"></i> Absensi Saya
            </a>
            <a href="{{ route('guru.jadwal') }}" class="sidebar-link">
                <i class="fa-solid fa-calendar-days me-2"></i> Jadwal Mengajar
            </a>
            <div class="dropdown">
                <a class="sidebar-link dropdown-toggle text-white d-block mb-2" href="#" role="button"
                    id="dropdownRiwayat" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-clock-rotate-left me-2"></i> Riwayat
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownRiwayat">
                    <li>
                        <a class="dropdown-item" href="{{ route('guru.riwayat.mengajar') }}">
                            <i class="fas fa-user-check me-2"></i> Riwayat Mengajar
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('guru.absensi.rekap') }}">
                            <i class="fas fa-table me-2"></i> Rekap Absensi KBM
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('guru.riwayat') }}">
                            <i class="fa-solid fa-clock-rotate-left me-2"></i> Riwayat Absensi
                        </a>
                    </li>
                </ul>
            </div>

        @elseif (auth()->user()->role->nama_role === 'siswa')
            <a href="{{ route('siswa.index') }}" class="sidebar-link text-white d-block mb-2">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>

            <div class="text-uppercase text-white-50 small mt-4 mb-2">Menu Siswa</div>

            <a href="{{ route('siswa.absen.form') }}" class="sidebar-link text-white d-block mb-2">
                <i class="fas fa-user-clock me-2"></i> Absen Sekarang
            </a>
            <a href="{{ route('siswa.riwayat') }}" class="sidebar-link text-white d-block mb-2">
                <i class="fas fa-history me-2"></i> Riwayat Kehadiran
            </a>
        @endif
    </div>
</section>
