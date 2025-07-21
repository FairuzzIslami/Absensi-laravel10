<!-- Navbar -->
<nav class="navbar navbar-expand navbar-light bg-white shadow-sm fixed-top default" id="mainNavbar">
    <div class="container-fluid">

        <!-- Tombol Toggle Sidebar -->
        <button class="btn btn-outline-primary me-3" id="toggleSidebar">
            <i class="fa-solid fa-bars"></i>
        </button>

        <!-- User Info -->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button"
                    data-bs-toggle="dropdown">
                    <span class="fw-semibold">{{ Auth::user()->username }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow">
                    <li class="px-3 py-2 text-center border-bottom">
                        {{-- role dan emailnya --}}
                        <small class="text-muted">{{ ucfirst(Auth::user()->role->nama_role) }}</small><br>
                        <small class="text-muted">{{ Auth::user()->email }}</small>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2" href="#">
                            <i class="bi bi-person-lines-fill text-primary"></i> Profil
                        </a>
                    </li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="button" onclick="confirmLogout()" class="dropdown-item">
                                <i class="fa-solid fa-sign-out-alt me-1"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
