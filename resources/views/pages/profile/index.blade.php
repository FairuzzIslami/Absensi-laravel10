@extends('layout.layout')

@section('content')
<div class="content mt-5 py-4" id="mainContent">
    <h3 class="mb-4">
        <i class="bi bi-person-circle me-2"></i> Profil Pengguna
    </h3>
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <!-- Foto Profil -->
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    @if ($user->foto)
                        <img src="{{ asset('storage/' . $user->foto) }}"
                            class="rounded-circle border border-3 border-light shadow-sm"
                            alt="Foto Profil"
                            style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center border shadow-sm"
                            style="width: 150px; height: 150px;">
                            <i class="fa-solid fa-user fa-3x"></i>
                        </div>
                    @endif
                </div>
                <!-- Info Profil -->
                <div class="col-md-8">
                    <h4 class="fw-bold mb-1">{{ $user->username }}</h4>
                    <span class="badge bg-{{ $user->role->nama_role === 'admin' ? 'danger' : ($user->role->nama_role === 'guru' ? 'success' : 'primary') }} px-3 py-2">
                        {{ ucfirst($user->role->nama_role) }}
                    </span>

                    <div class="mt-3">
                        <p class="mb-2"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="mb-2"><strong>Bergabung Sejak:</strong> {{ $user->created_at->format('d M Y') }}</p>

                        @if ($user->role->nama_role === 'admin')
                            <p class="mb-2"><strong>Hak Akses:</strong> Mengelola seluruh sistem (User, Kelas, Kehadiran, dll).</p>
                        @elseif ($user->role->nama_role === 'guru')
                            <p class="mb-2"><strong>Kelas yang Diampu:</strong> {{ $user->kelas->kelas ?? 'Belum ada kelas' }} ({{ $user->kelas->jurusan ?? '-' }})</p>
                        @elseif ($user->role->nama_role === 'siswa')
                            <p class="mb-2"><strong>Kelas:</strong> {{ $user->kelas->kelas ?? 'Belum ditentukan' }}</p>
                            <p class="mb-2 text-uppercase"><strong>Jurusan:</strong> {{ $user->kelas->jurusan ?? 'Belum ditentukan' }}</p>
                        @endif
                    </div>
                    <!-- Tombol Aksi -->
                    <div class="mt-4 d-flex flex-wrap gap-2">
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">
                            <i class="bi bi-pencil-square me-1"></i> Edit Profil
                        </a>
                        <a href="{{ route('password.change') }}" class="btn btn-outline-warning">
                            <i class="bi bi-key-fill me-1"></i> Ubah Password
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
