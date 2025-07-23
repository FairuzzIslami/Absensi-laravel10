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


            <hr class="border-light opacity-25 mx-3" />

            <!-- Menu Rekap -->
            <div class="text-white-50 text-uppercase mt-3 mb-2 px-3 small">Manajemen Data</div>
            <a href="{{ route('kelas.index') }}" class="sidebar-link">
                <i class="fas fa-school me-2"></i> Buat Kelas
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
            <a href="{{ route('guru.riwayat') }}" class="sidebar-link">
                <i class="fa-solid fa-clock-rotate-left me-2"></i> Riwayat Absensi
            </a>
        @endif
    </div>
</section>
