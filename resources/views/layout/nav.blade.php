<!-- Navbar -->
<nav class="navbar navbar-expand navbar-light bg-white shadow-sm fixed-top default" id="mainNavbar">
    <div class="container-fluid">

        <!-- Tombol Toggle Sidebar -->
        <button class="btn btn-outline-primary me-3" id="toggleSidebar">
            <i class="fa-solid fa-bars"></i>
        </button>

        <!-- User Info -->
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    @if (Auth::user()->foto)
                        <img src="{{ asset('storage/' . Auth::user()->foto) }}" class="rounded-circle shadow-sm border"
                            width="32" height="32" style="object-fit: cover;" alt="User Avatar">
                    @else
                        <div class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center"
                            style="width: 32px; height: 32px;">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    @endif
                    <span class="fw-semibold">{{ Auth::user()->username }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm rounded">
                    <li class="px-3 py-2 text-center border-bottom">
                        <div class="fw-semibold text-capitalize">{{ Auth::user()->role->nama_role }}</div>
                        <small class="text-muted">{{ Auth::user()->email }}</small>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('profile') }}">
                            <i class="bi bi-person-lines-fill text-primary"></i> Profil
                        </a>
                    </li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="button" onclick="confirmLogout()"
                                class="dropdown-item d-flex align-items-center gap-2">
                                <i class="fa-solid fa-sign-out-alt text-danger"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
