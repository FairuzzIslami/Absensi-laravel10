@extends('layout.layout')

@section('content')
<div class="content mt-5 py-4" id="mainContent">
    <h3 class="mb-4">
        <i class="bi bi-person-circle"></i> Profil
    </h3>
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <!-- Foto Profil -->
                <div class="col-md-3 text-center mb-3 mb-md-0">
                    <img src="{{ asset('asset/image/girl.png') }}"
                         class="rounded-circle shadow-sm border p-1"
                         alt="Foto Profil"
                         style="width: 140px; height: 140px; object-fit: cover;">
                </div>

                <!-- Info Profil -->
                <div class="col-md-9">
                    <div class="mb-2">
                        <h4 class="fw-bold">{{ $user->username }}</h4>
                        <span class="badge bg-primary px-3 py-2">{{ ucfirst($user->role->nama_role) }}</span>
                    </div>
                    <p class="mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="mb-1"><strong>Bergabung Sejak:</strong> {{ $user->created_at->format('d M Y') }}</p>

                    {{-- Bagian khusus tiap role --}}
                    @if ($user->role->nama_role === 'admin')
                        <p class="mt-2"><strong>Hak Akses:</strong> Mengelola seluruh sistem (User, Kelas, Kehadiran, dll).</p>

                    @elseif ($user->role->nama_role === 'guru')
                        <p class="mt-2"><strong>Kelas yang Diampu:</strong>
                            {{ $user->kelas->kelas ?? 'Belum ada kelas' }}
                            ({{ $user->kelas->jurusan ?? '-' }})
                        </p>

                    @elseif ($user->role->nama_role === 'siswa')
                        <p class="mt-2"><strong>Kelas:</strong> {{ $user->kelas->kelas ?? 'Belum ditentukan' }}</p>
                        <p class="mt-1"><strong>Jurusan:</strong> {{ $user->kelas->jurusan ?? 'Belum ditentukan' }}</p>
                    @endif

                    <!-- Tombol Aksi -->
                    <div class="mt-4 d-flex gap-2">
                        <a href="{{route('profile.edit')}}" class="btn btn-outline-primary">
                            <i class="bi bi-pencil-square"></i> Edit Profil
                        </a>
                        <a href="{{route('password.change')}}" class="btn btn-outline-warning">
                            <i class="bi bi-key-fill"></i> Ubah Password
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
