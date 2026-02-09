
@extends('layout.layout')

@section('content')
<section>
    <div class="content pt-5 mt-4" id="mainContent">

        {{-- JUDUL --}}
        <h1 class="h3 mb-4 text-uppercase">
            <i class="fa-solid fa-calendar-check"></i>
            Rekap Absensi KBM
        </h1>

        {{-- FORM PILIH REKAP --}}
        <div class="mb-4">
            <form method="GET" action="{{ route('guru.absensi.rekap') }}" class="d-flex gap-2 align-items-center flex-wrap">
                <label class="me-2">Tipe Rekap:</label>
                <select name="tipe" class="form-select w-auto" onchange="this.form.submit()">
                    <option value="minggu" {{ $tipe=='minggu'?'selected':'' }}>Mingguan</option>
                    <option value="bulan" {{ $tipe=='bulan'?'selected':'' }}>Bulanan</option>
                </select>

                @if($tipe=='minggu')
                    <label class="ms-2">Pilih Tanggal:</label>
                    <input type="date" name="tanggal" class="form-control w-auto" value="{{ $start->toDateString() }}">
                @else
                    <label class="ms-2">Pilih Bulan:</label>
                    <input type="month" name="bulan" class="form-control w-auto" value="{{ $start->format('Y-m') }}">
                @endif

                <button class="btn btn-primary ms-2">Tampilkan</button>
            </form>
        </div>

        {{-- TABEL REKAP --}}
        @forelse($rekap as $mapel => $siswas)
            <h5 class="mt-4 mb-2 fw-bold">{{ $mapel }}</h5>
            <div class="table-responsive shadow-sm rounded">
                <table class="table table-bordered table-hover align-middle text-center responsive-table">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>Hadir</th>
                            <th>Izin</th>
                            <th>Sakit</th>
                            <th>Alpha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswas as $index => $absensiSiswa)
                            @php
                                $siswaName = $absensiSiswa->first()->siswa->username ?? $index;
                                $hadir = $absensiSiswa->where('status','hadir')->count();
                                $izin = $absensiSiswa->where('status','izin')->count();
                                $sakit = $absensiSiswa->where('status','sakit')->count();
                                $alpha = $absensiSiswa->where('status','alpha')->count();
                            @endphp
                            <tr>
                                <td data-label="#">{{ $loop->iteration }}</td>
                                <td data-label="Nama">{{ $siswaName }}</td>
                                <td data-label="Hadir"><span class="badge bg-success px-3 py-2">{{ $hadir }}</span></td>
                                <td data-label="Izin"><span class="badge bg-warning text-dark px-3 py-2">{{ $izin }}</span></td>
                                <td data-label="Sakit"><span class="badge bg-info text-dark px-3 py-2">{{ $sakit }}</span></td>
                                <td data-label="Alpha"><span class="badge bg-danger px-3 py-2">{{ $alpha }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @empty
            <div class="alert alert-secondary mt-3">
                Tidak ada data rekap absensi untuk periode ini.
            </div>
        @endforelse

        {{-- KEMBALI --}}
        <div class="mt-4">
            <a href="{{ route('guru.jadwal') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Jadwal
            </a>
        </div>

    </div>
</section>
@endsection
