@extends('layout.layout')

@section('content')
    <section>
        <div class="content pt-5 mt-4" id="mainContent">
            <h1 class="h3 mb-4">
                <i class="fa-solid fa-door-open"></i> Data Kelas
            </h1>

            <!-- Form Pencarian -->
            <div class="d-flex justify-content-end mb-3">
                <form class="d-flex" role="search" method="GET" action="{{ route('guru.kelas') }}">
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
                            <th>Jumlah Siswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kelas as $index => $k)
                            <tr>
                                <td>{{ $kelas->firstItem() + $index }}</td>
                                @php
                                    $kelasColor =
                                        [
                                            '10' => 'bg-success text-white',
                                            '11' => 'bg-warning text-dark',
                                            '12' => 'bg-danger text-white',
                                        ][$k->kelas] ?? 'bg-secondary text-white';
                                @endphp
                                <td>
                                    <span class="badge {{ $kelasColor }}">
                                        {{ $k->kelas }}
                                    </span>
                                </td>
                                <td class="text-uppercase">{{ $k->jurusan ?? '-' }}</td>
                                <td>
                                    @php
                                        $jumlahSiswa = $k->users_count ?? 0;
                                        $badgeClass =
                                            $jumlahSiswa > 0 ? 'bg-info text-white' : 'bg-secondary text-white';
                                        $badgeText = $jumlahSiswa > 0 ? "$jumlahSiswa Siswa" : 'Belum ada siswa';
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">
                                        <i class="fa-solid fa-users"></i> {{ $badgeText }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('guru.kelas.detail', $k->id_kelas) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="fa-solid fa-eye"></i> Lihat Siswa
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data kelas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>



                {{-- Paginate --}}
                @if ($kelas->hasPages())
                    <div class="mt-4">
                        {{ $kelas->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
