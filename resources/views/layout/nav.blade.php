    <nav class="navbar shadow-sm navbar-expand-lg bg-body-tertiary p-2">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ '/kehadiran' }}">Daftar Absensi</a>
                    </li>
                </ul>
                <div class="d-flex" role="search">
                    <a href="{{route('login')}}" class="btn btn-danger">Login   </a>
                </div>
            </div>
    </nav>
