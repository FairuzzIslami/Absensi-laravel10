@extends('layout.layout')

@section('content')
    <section>
        <div class="content pt-5 mt-4" id="mainContent">
            <h1 class="h3 mb-4">
                <i class="fa-solid fa-door-open"></i> Data Kelas
            </h1>

            <!-- Baris Atas -->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <a href="{{ route('kelas.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i> Tambah Kelas
                </a>
            </div>

            <!-- Form Pencarian -->
            <div class="d-flex justify-content-end mb-3">
                <form class="d-flex" role="search" method="GET" action="{{ route('kelas.index') }}">
                    <input class="form-control me-2" type="search" name="search" placeholder="Cari Kelas..."
                        aria-label="Search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>


            <!-- Tabel Kelas -->
            <div class="table-responsive shadow-sm rounded">
                <table class="table table-striped table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Tingkat Kelas</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kelas as $index => $k)
                            <tr>
                                <td>{{ $index + $kelas->firstItem() }}</td>
                                @php
                                    $kelasColor =
                                        [
                                            '10' => 'bg-success text-white',
                                            '11' => 'bg-warning text-dark',
                                            '12' => 'bg-danger text-white',
                                        ][$k->kelas] ?? '';
                                @endphp

                                <td>
                                    <span class="badge {{ $kelasColor }}">
                                        {{ $k->kelas }}
                                    </span>
                                </td>
                                <td class="text-uppercase">{{ $k->jurusan ?? '-' }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <!-- Edit -->
                                        <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#editModal-{{ $k->id_kelas }}">
                                            <i class="fa-solid fa-pen-to-square"></i>

                                        </button>
                                        <!-- Detail -->
                                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                                            data-bs-target="#detailModal-{{ $k->id_kelas }}">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </button>


                                        <!-- Delete -->
                                        <button type="button" class="btn btn-sm btn-outline-danger" title="Hapus"
                                            onclick="confirmDelete({{ $k->id_kelas }})">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                        <form id="delete-form-{{ $k->id_kelas }}"
                                            action="{{ route('kelas.destroy', $k->id_kelas) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @include('pages.admin.kelas.model.edit')
                            @include('pages.admin.kelas.model.detail')
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada data kelas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- paginate --}}
                @if ($kelas->hasPages())
                    <nav aria-label="Navigasi halaman" class="mt-4">
                        <ul class="pagination justify-content-center shadow-sm p-2 rounded bg-light">

                            {{-- Tombol Previous --}}
                            @if ($kelas->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">&laquo;</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $kelas->previousPageUrl() }}" aria-label="Sebelumnya">
                                        &laquo;
                                    </a>
                                </li>
                            @endif

                            {{-- Nomor Halaman --}}
                            @foreach ($kelas->links()->elements[0] ?? [] as $page => $url)
                                <li class="page-item {{ $page == $kelas->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            {{-- Tombol Next --}}
                            @if ($kelas->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $kelas->nextPageUrl() }}" aria-label="Selanjutnya">
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
