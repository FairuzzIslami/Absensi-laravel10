@extends('layout.layout')

@section('content')
<section>
    <div class="content pt-5 mt-4" id="mainContent">

        {{-- Judul --}}
        <h1 class="h3 mb-4 text-uppercase">
            <i class="fa-solid fa-clock-rotate-left"></i>
            Riwayat Mengajar
        </h1>

        {{-- FORM FILTER PERIODE --}}
        <div class="mb-4">
            <form method="GET" action="{{ route('guru.riwayat.mengajar') }}" class="d-flex gap-2 flex-wrap align-items-center">
                <label>Dari:</label>
                <input type="date" name="start" class="form-control w-auto" value="{{ $start->toDateString() }}">

                <label>Sampai:</label>
                <input type="date" name="end" class="form-control w-auto" value="{{ $end->toDateString() }}">

                <button class="btn btn-primary">Tampilkan</button>
            </form>
        </div>

        {{-- Tabel Riwayat --}}
        @forelse($riwayat as $mapel => $kelasList)
            <h5 class="mt-4 mb-2 fw-bold">{{ $mapel }}</h5>

            @foreach($kelasList as $kelas => $absensiList)
                <h6 class="mb-2">{{ $kelas }}</h6>
                <div class="table-responsive shadow-sm rounded">
                    <table class="table table-bordered table-hover align-middle text-center responsive-table">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Hadir</th>
                                <th>Izin</th>
                                <th>Sakit</th>
                                <th>Alpha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($absensiList as $absensi)
                                @php
                                    $hadir = $absensi->where('status','hadir')->count();
                                    $izin = $absensi->where('status','izin')->count();
                                    $sakit = $absensi->where('status','sakit')->count();
                                    $alpha = $absensi->where('status','alpha')->count();
                                @endphp
                                <tr>
                                    <td data-label="No">{{ $loop->iteration }}</td>
                                    <td data-label="Tanggal">{{ $absensi->tanggal }}</td>
                                    <td data-label="Hadir"><span class="badge bg-success px-3 py-2">{{ $hadir }}</span></td>
                                    <td data-label="Izin"><span class="badge bg-warning text-dark px-3 py-2">{{ $izin }}</span></td>
                                    <td data-label="Sakit"><span class="badge bg-info text-dark px-3 py-2">{{ $sakit }}</span></td>
                                    <td data-label="Alpha"><span class="badge bg-danger px-3 py-2">{{ $alpha }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        @empty
            <div class="alert alert-secondary mt-3">
                Tidak ada riwayat mengajar di periode ini.
            </div>
        @endforelse

        {{-- Kembali --}}
        <div class="mt-4">
            <a href="{{ route('guru.jadwal') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Jadwal
            </a>
        </div>

    </div>
</section>
@endsection
