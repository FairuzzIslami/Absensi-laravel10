@extends('layout.layout')

@section('content')
    <section>
        <div class="content pt-5 mt-4" id="mainContent">
            <h1 class="h3 mb-4 text-uppercase">
                <i class="fa-solid fa-users"></i> Detail Siswa - Kelas {{ $kelas->kelas }} ({{ $kelas->jurusan }})
            </h1>

            <!-- Tombol Kembali & Search -->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <a href="{{ route('guru.kelas') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
                <form class="d-flex" role="search" method="GET"
                    action="{{ route('guru.kelas.detail', $kelas->id_kelas) }}">
                    <input class="form-control me-2" type="search" name="search" placeholder="Cari Nama Siswa..."
                        aria-label="Search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>

            <!-- Tabel Siswa -->
            <div class="table-responsive shadow-sm rounded">
                <table class="table table-striped table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>Email</th>
                            <th>Absensi Hari Ini</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswa as $index => $s)
                            <tr>
                                <td>{{ $siswa->firstItem() + $index }}</td>
                                <td>{{ $s->username }}</td>
                                <td>{{ $s->email }}</td>
                                <td>
                                    @php
                                        $absenHariIni = $s->kehadiran
                                            ->where('tanggal_kehadiran', date('Y-m-d'))
                                            ->first();
                                    @endphp

                                    @if ($absenHariIni)
                                        @php
                                            $status = $absenHariIni->status;
                                            $badgeClass =
                                                [
                                                    'Hadir' => 'bg-success',
                                                    'Izin' => 'bg-warning text-dark',
                                                    'Sakit' => 'bg-info text-dark',
                                                    'Alpa' => 'bg-danger',
                                                ][$status] ?? 'bg-secondary';
                                        @endphp
                                        <span class="badge {{ $badgeClass }}">{{ $status }}</span>
                                    @else
                                        <span class="badge bg-secondary">Belum ada keterangan</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-muted">Belum ada siswa di kelas ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


            {{-- Paginate --}}
            @if ($siswa->hasPages())
                <div class="mt-4">
                    {{ $siswa->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </section>
@endsection
