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
        <a href="{{route('admin.index')}}" class="sidebar-link">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>

        <!-- Menu Admin -->
        <div class="text-white-50 text-uppercase mt-3 mb-2 px-3 small">Menu Admin</div>
        <a href="{{route('user.index')}}" class="sidebar-link">
            <i class="fas fa-users me-2"></i> Data User
        </a>
        <a href="#" class="sidebar-link">
            <i class="fas fa-clipboard-check me-2"></i> Data Kehadiran
        </a>

        <hr class="border-light opacity-25 mx-3" />

        <!-- Menu Rekap -->
        <div class="text-white-50 text-uppercase mt-3 mb-2 px-3 small">Manajemen Data</div>
        <a href="{{route('kelas.index')}}" class="sidebar-link">
            <i class="fas fa-school me-2"></i> Buat Kelas
        </a>
    </div>
</section>
