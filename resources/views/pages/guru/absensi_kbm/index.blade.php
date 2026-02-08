@extends('layout.layout')

@section('content')
    <section>
        <div class="content pt-5 mt-4" id="mainContent">

            {{-- JUDUL --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 text-uppercase">
                    <i class="fa-solid fa-calendar-check me-2"></i> Absensi KBM
                </h1>
                <span class="badge bg-primary fs-6">
                    {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                </span>
            </div>

            {{-- INFO JADWAL --}}
            <div class="card shadow-sm mb-4">
                <div class="card-body d-flex justify-content-between flex-wrap gap-2 align-items-center">
                    <div>
                        <strong>Kelas:</strong> {{ $jadwal->kelas->kelas }} ({{ $jadwal->kelas->jurusan }})
                        <span class="mx-2">|</span>
                        <strong>Mapel:</strong> {{ $jadwal->mapel->nama_mapel ?? 'Mapel belum diset' }}
                        <span class="mx-2">|</span>
                        <strong>Jam:</strong> {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
                    </div>
                </div>
            </div>

            {{-- FORM PILIH REKAP --}}
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <form method="GET" action="{{ route('guru.absensi.rekap') }}" class="row g-2 align-items-center">

                        <div class="col-auto">
                            <label class="form-label">Tipe Rekap:</label>
                            <select name="tipe" class="form-select" onchange="this.form.submit()">
                                <option value="minggu" {{ $tipe == 'minggu' ? 'selected' : '' }}>Mingguan</option>
                                <option value="bulan" {{ $tipe == 'bulan' ? 'selected' : '' }}>Bulanan</option>
                            </select>
                        </div>

                        @if ($tipe == 'minggu')
                            <div class="col-auto">
                                <label class="form-label">Pilih Tanggal:</label>
                                <input type="date" name="tanggal" class="form-control"
                                    value="{{ $start->toDateString() }}">
                            </div>
                        @else
                            <div class="col-auto">
                                <label class="form-label">Pilih Bulan:</label>
                                <input type="month" name="bulan" class="form-control"
                                    value="{{ $start->format('Y-m') }}">
                            </div>
                        @endif

                        <div class="col-auto mt-4">
                            <button class="btn btn-primary">Tampilkan</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- TABEL --}}
            <div class="table-responsive shadow-sm rounded">
                <table class="table table-striped table-hover align-middle text-center responsive-table">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status KBM</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jadwal->kelas->users as $index => $siswa)
                            @php
                                $absen = $jadwal->absensiKbm->where('siswa_id', $siswa->id)->first();
                                $statusBadge = $absen
                                    ? match ($absen->status) {
                                        'hadir' => 'bg-success',
                                        'izin' => 'bg-warning text-dark',
                                        'sakit' => 'bg-info text-dark',
                                        'alpha' => 'bg-danger',
                                        default => 'bg-secondary',
                                    }
                                    : 'bg-secondary';
                            @endphp
                            <tr>
                                <td data-label="#">{{ $index + 1 }}</td>
                                <td  data-label="Nama">{{ $siswa->username }}</td>
                                <td data-label="Email">{{ $siswa->email }}</td>
                                <td data-label="Status KBM">
                                    <span class="badge {{ $statusBadge }} px-3 py-2">
                                        {{ $absen->status ?? 'Belum absen' }}
                                    </span>
                                </td>
                                <td data-label="Aksi">
                                    <form action="{{ route('guru.absensi.kbm.store') }}" method="POST"
                                        class="d-flex justify-content-center gap-1 flex-wrap">
                                        @csrf
                                        <input type="hidden" name="jadwal_mengajar_id" value="{{ $jadwal->id }}">
                                        <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                                        <button name="status" value="hadir" class="btn btn-sm btn-success">H</button>
                                        <button name="status" value="izin" class="btn btn-sm btn-warning">I</button>
                                        <button name="status" value="sakit" class="btn btn-sm btn-info">S</button>
                                        <button name="status" value="alpha" class="btn btn-sm btn-danger">A</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-muted">Tidak ada siswa di kelas ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


            {{-- KEMBALI --}}
            <div class="mt-4 text-end">
                <a href="{{ route('guru.jadwal') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Jadwal
                </a>
            </div>

        </div>
    </section>
@endsection
