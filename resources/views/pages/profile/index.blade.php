@extends('layout.layout')

@section('content')
<div class="content mt-5 py-4" id="mainContent">

    <h3 class="mb-4">
        <i class="bi bi-person-circle me-2"></i> Profil Pengguna
    </h3>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <div class="row align-items-center">

                <!-- FOTO PROFILE -->
                <div class="col-md-4 text-center mb-4 mb-md-0">

                    @if ($user->foto)
                        <img src="{{ asset('storage/' . $user->foto) }}"
                            class="rounded-circle border border-3 border-light shadow-sm profile-click"
                            alt="Foto Profil"
                            data-bs-toggle="modal"
                            data-bs-target="#fotoModal"
                            style="width: 150px; height: 150px; object-fit: cover; cursor: pointer;">
                    @else
                        <div class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center border shadow-sm"
                            style="width: 150px; height: 150px;">
                            <i class="fa-solid fa-user fa-3x"></i>
                        </div>
                    @endif

                </div>

                <!-- INFO PROFILE -->
                <div class="col-md-8">

                    <h4 class="fw-bold mb-1">{{ $user->username }}</h4>

                    <span class="badge bg-{{ $user->role->nama_role === 'admin' ? 'danger' : ($user->role->nama_role === 'guru' ? 'success' : 'primary') }} px-3 py-2">
                        {{ ucfirst($user->role->nama_role) }}
                    </span>

                    <div class="mt-3">
                        <p class="mb-2">
                            <strong>Email:</strong> {{ $user->email }}
                        </p>

                        <p class="mb-2">
                            <strong>Bergabung Sejak:</strong> {{ $user->created_at->format('d M Y') }}
                        </p>

                        @if ($user->role->nama_role === 'admin')
                            <p class="mb-2">
                                <strong>Hak Akses:</strong> Mengelola seluruh sistem (User, Kelas, Kehadiran, dll).
                            </p>

                        @elseif ($user->role->nama_role === 'guru')
                            <p class="mb-2">
                                <strong>Kelas yang Diampu:</strong>
                                {{ $user->kelas->kelas ?? 'Belum ada kelas' }}
                                ({{ $user->kelas->jurusan ?? '-' }})
                            </p>

                        @elseif ($user->role->nama_role === 'siswa')
                            <p class="mb-2">
                                <strong>Kelas:</strong>
                                {{ $user->kelas->kelas ?? 'Belum ditentukan' }}
                            </p>

                            <p class="mb-2 text-uppercase">
                                <strong>Jurusan:</strong>
                                {{ $user->kelas->jurusan ?? 'Belum ditentukan' }}
                            </p>
                        @endif
                    </div>

                    <!-- TOMBOL AKSI -->
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

<!-- MODAL FOTO PROFILE -->
@if ($user->foto)
<div class="modal fade" id="fotoModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">

            <div class="modal-body text-center position-relative">

                <!-- CLOSE BUTTON -->
                <button type="button"
                    class="btn-close btn-close-white position-absolute top-0 end-0 me-2 mt-2"
                    data-bs-dismiss="modal"></button>

                <!-- FOTO BESAR -->
                <img src="{{ asset('storage/' . $user->foto) }}"
                    class="img-fluid rounded-4 shadow-lg"
                    style="max-height: 80vh;">

            </div>
        </div>
    </div>
</div>
@endif

@endsection


@push('styles')
<style>
    .profile-click:hover {
        transform: scale(1.05);
        transition: 0.2s ease;
    }
</style>
@endpush
