@extends('layout.layout')

@section('content')
    <section>
        <div class="content pt-5 mt-4" id="mainContent">

            {{-- JUDUL --}}
            <h1 class="h3 mb-4 text-uppercase">
                <i class="fa-solid fa-clock-rotate-left"></i>
                Riwayat Mengajar
            </h1>

            {{-- FILTER TANGGAL --}}
            <div class="mb-4">
                <form method="GET" action="{{ route('guru.riwayat.mengajar') }}"
                    class="d-flex gap-2 flex-wrap align-items-center">

                    <label>Dari:</label>
                    <input type="date" name="start" class="form-control w-auto" value="{{ $start->toDateString() }}">

                    <label>Sampai:</label>
                    <input type="date" name="end" class="form-control w-auto" value="{{ $end->toDateString() }}">

                    <button class="btn btn-primary">
                        <i class="fa-solid fa-filter"></i> Tampilkan
                    </button>
                </form>
            </div>

            {{-- DATA --}}
            @forelse ($riwayat as $item)
                <h5 class="fw-bold mt-4">
                    {{ $item['mapel'] }} - Kelas {{ $item['kelas'] }}
                </h5>

                <p class="text-muted">
                    Tanggal: {{ \Carbon\Carbon::parse($item['tanggal'])->format('d-m-Y') }}
                </p>

                <table class="table table-bordered text-center mb-4">
                    <thead class="table-light">
                        <tr>
                            <th>Hadir</th>
                            <th>Izin</th>
                            <th>Sakit</th>
                            <th>Alpha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $item['hadir'] }}</td>
                            <td>{{ $item['izin'] }}</td>
                            <td>{{ $item['sakit'] }}</td>
                            <td>{{ $item['alpha'] }}</td>
                        </tr>
                    </tbody>
                </table>

            @empty
                <div class="alert alert-secondary">
                    Tidak ada data riwayat mengajar.
                </div>
            @endforelse


            {{-- KEMBALI --}}
            <a href="{{ route('guru.jadwal') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Jadwal
            </a>

        </div>
    </section>
@endsection
