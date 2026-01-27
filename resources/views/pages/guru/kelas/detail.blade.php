@extends('layout.layout')

@section('content')
    <section>
        <div class="content pt-5 mt-4" id="mainContent">
            <h1 class="h3 mb-4 text-uppercase">
                <i class="fa-solid fa-users"></i> Detail Siswa - Kelas {{ $kelas->kelas }} ({{ $kelas->jurusan }})
            </h1>

            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <!-- Kiri -->
                <a href="{{ route('guru.kelas') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>

                <!-- Kanan -->
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('guru.kelas.export.pdf', ['id' => $kelas->id_kelas, 'search' => request('search')]) }}"
                        class="btn btn-outline-danger">
                        <i class="bi bi-file-earmark-pdf-fill"></i> PDF
                    </a>

                    <a href="{{ route('guru.kelas.export.csv', ['id' => $kelas->id_kelas, 'search' => request('search')]) }}"
                        class="btn btn-outline-success">
                        <i class="bi bi-file-earmark-excel-fill"></i> CSV
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
            </div>

            <!-- Badge Tanggal Hari Ini dan Total Data -->
            <div class="alert alert-info d-flex justify-content-between align-items-center shadow-sm">
                <span>
                     <i class="fa-solid fa-calendar-day me-1"></i>
                    <strong>Hari Ini:</strong> {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                        |
                    <i class="fa-solid fa-clock ms-2 me-1"></i>
                    <span id="liveClock"></span>
                </span>
                <span class="badge bg-primary">
                    Total Siswa: {{ $siswa->total() }}
                </span>
            </div>

            <!-- Tabel Siswa -->
            <div class="table-responsive shadow-sm rounded">
                <table class="table table-striped table-hover align-middle text-center responsive-table">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>Email</th>
                            <th>Absensi Hari Ini</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswa as $index => $s)
                            <tr>
                                <td data-label="#">{{ $siswa->firstItem() + $index }}</td>
                                <td data-label="Nama">{{ $s->username }}</td>
                                <td data-label="Email">{{ $s->email }}</td>
                                <td data-label="Status">
                                    @php
                                        $absenHariIni = $s->kehadiran
                                            ->where('tanggal_kehadiran', date('Y-m-d'))
                                            ->first();
                                    @endphp

                                    @if ($absenHariIni)
                                        @php
                                            $status = ucfirst(trim($absenHariIni->status));
                                            $badgeClass =
                                                [
                                                    'Hadir' => 'bg-success',
                                                    'Izin' => 'bg-warning text-dark',
                                                    'Sakit' => 'bg-info text-dark',
                                                    'Alpa' => 'bg-danger',
                                                ][$status] ?? 'bg-secondary';
                                        @endphp
                                        <span class="badge {{ $badgeClass }}">{{ $absenHariIni->status }}</span>
                                    @else
                                        <span class="badge bg-secondary">Belum ada keterangan</span>
                                    @endif
                                </td>

                                <td data-label="Aksi">
                                    <form action="{{ route('guru.absen.siswa') }}" method="POST"
                                        class="d-flex justify-content-center gap-1">
                                        @csrf

                                        <input type="hidden" name="user_id" value="{{ $s->id }}">
                                        <input type="hidden" name="tanggal_kehadiran" value="{{ date('Y-m-d') }}">

                                        <button name="status" value="Hadir" class="btn btn-sm btn-success">H</button>
                                        <button name="status" value="Izin" class="btn btn-sm btn-warning">I</button>
                                        <button name="status" value="Sakit" class="btn btn-sm btn-info">S</button>
                                        <button name="status" value="tanpa keterangan" class="btn btn-sm btn-danger">A</button>
                                    </form>
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
