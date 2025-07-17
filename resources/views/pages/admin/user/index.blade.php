@extends('layout.layout')

@section('content')
    <section>
        <div class="content pt-5 mt-4" id="mainContent">
            <h1 class="h3 mb-4">
                <i class="fa-solid fa-user"></i> Data User
            </h1>

            <!-- Baris Atas -->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <a href="{{ route('user.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i> Tambah Data
                </a>
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-outline-danger">
                        <i class="bi bi-file-earmark-pdf-fill"></i> PDF
                    </a>
                    <a href="#" class="btn btn-outline-success">
                        <i class="bi bi-file-earmark-excel-fill"></i> Excel
                    </a>
                </div>
            </div>

            <!-- Form Pencarian -->
            <div class="d-flex justify-content-end mb-3">
                <form class="d-flex" role="search" method="GET" action="#">
                    <input class="form-control me-2" type="search" name="search" placeholder="Cari Nama...."
                        aria-label="Search">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>

            <!-- Tabel User -->
            <div class="table-responsive shadow-sm rounded">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $user)
                            <tr>
                                <td>{{ $index + $users->firstItem() }}</td>
                                <td class="text-start">{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @php
                                        $roleColors = [
                                            'admin' => 'bg-danger', // merah
                                            'guru' => 'bg-primary', // biru
                                            'siswa' => 'bg-success', // hijau
                                        ];
                                        $roleClass = $roleColors[$user->role->nama_role] ?? 'bg-secondary';
                                    @endphp

                                    <span class="badge {{ $roleClass }}">
                                        {{ ucfirst($user->role->nama_role) }}
                                    </span>
                                </td>
                                <td>
                                    @if ($user->kehadiran->isNotEmpty())
                                        @php $status = $user->kehadiran->last()->status; @endphp
                                        @if ($status == 'hadir')
                                            <span class="badge bg-success">Masuk</span>
                                        @elseif($status == 'izin')
                                            <span class="badge bg-warning text-dark">Izin</span>
                                        @elseif($status == 'sakit')
                                            <span class="badge bg-danger">Sakit</span>
                                        @else
                                            <span class="badge bg-secondary">Tanpa Keterangan</span>
                                        @endif
                                    @else
                                        <span class="badge bg-secondary">Belum Ada Data</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <!-- Edit -->
                                        <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#editModal-{{ $user->id }}" title="Edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        <!-- Detail -->
                                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                                            data-bs-target="#detailModal-{{ $user->id }}" title="Detail">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </button>

                                        <!-- Delete -->
                                        <button type="button" class="btn btn-sm btn-outline-danger" title="Hapus"
                                            onclick="confirmDelete({{ $user->id }})">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $user->id }}"
                                            action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- Include Modal -->
                            @include('pages.admin.user.model.edit')
                            @include('pages.admin.user.model.detail')
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada data user.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- paginate --}}
                @if ($users->hasPages())
                    <nav aria-label="Navigasi halaman" class="mt-4">
                        <ul class="pagination justify-content-center shadow-sm p-2 rounded bg-light">

                            {{-- Tombol Previous --}}
                            @if ($users->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">&laquo;</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Sebelumnya">
                                        &laquo;
                                    </a>
                                </li>
                            @endif

                            {{-- Nomor Halaman --}}
                            @foreach ($users->links()->elements[0] ?? [] as $page => $url)
                                <li class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            {{-- Tombol Next --}}
                            @if ($users->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Selanjutnya">
                                        &raquo;
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">&raquo;</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </section>
@endsection
