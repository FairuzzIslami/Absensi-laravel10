@extends('layout.layout')

@section('content')
    <section>
        <div class="content pt-5 mt-4" id="mainContent">

            <h1 class="h3 mb-4 text-uppercase">
                <i class="fa-solid fa-clock-rotate-left"></i> Riwayat Mengajar
            </h1>

            {{-- FILTER --}}
            <div class="mb-4">
                <div class="card shadow-sm p-3">
                    <form method="GET" action="{{ route('guru.riwayat.mengajar') }}" class="row g-3 align-items-end">

                        <div class="col-auto">
                            <label class="form-label mb-1">Dari</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                <input type="date" name="start" class="form-control"
                                    value="{{ $start->toDateString() }}">
                            </div>
                        </div>

                        <div class="col-auto">
                            <label class="form-label mb-1">Sampai</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                <input type="date" name="end" class="form-control"
                                    value="{{ $end->toDateString() }}">
                            </div>
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                                <i class="fa-solid fa-filter"></i> Tampilkan
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            {{-- DATA RIWAYAT --}}
            @forelse ($riwayat as $item)
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-2">
                            {{ $item['mapel'] }} - Kelas {{ $item['kelas'] }}
                        </h5>
                        <p class="text-muted mb-3">
                            {{ \Carbon\Carbon::parse($item['tanggal'])->format('d-m-Y') }}
                            • {{ $item['jam_mulai'] ?? '-' }} - {{ $item['jam_selesai'] ?? '-' }}
                        </p>

                        <div class="d-flex justify-content-center gap-3">
                            <span class="badge bg-success p-2 w-25">Hadir: {{ $item['hadir'] }}</span>
                            <span class="badge bg-info p-2 w-25">Izin: {{ $item['izin'] }}</span>
                            <span class="badge bg-warning text-dark p-2 w-25">Sakit: {{ $item['sakit'] }}</span>
                            <span class="badge bg-danger p-2 w-25">Alpha: {{ $item['alpha'] }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-secondary text-center">
                    Tidak ada data riwayat mengajar.
                </div>
            @endforelse

            <a href="{{ route('guru.jadwal') }}" class="btn btn-secondary d-flex align-items-center gap-1">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Jadwal
            </a>

        </div>
    </section>
@endsection
