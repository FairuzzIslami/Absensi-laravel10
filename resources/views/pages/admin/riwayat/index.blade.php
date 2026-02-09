@extends('layout.layout')

@section('content')
<div class="content pt-5 mt-4">

    <h1 class="h4 mb-4">
        <i class="fa-solid fa-clock-rotate-left"></i>
        Riwayat Mengajar Guru
    </h1>

    {{-- FILTER --}}
    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-4">
            <select name="guru_id" class="form-select" required>
                <option value="">-- Pilih Guru --</option>
                @foreach($guruList as $guru)
                    <option value="{{ $guru->id }}"
                        {{ $guruId == $guru->id ? 'selected' : '' }}>
                        {{ $guru->username }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <input type="date" name="start" class="form-control"
                value="{{ $start->toDateString() }}">
        </div>

        <div class="col-md-3">
            <input type="date" name="end" class="form-control"
                value="{{ $end->toDateString() }}">
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary w-100">Tampilkan</button>
        </div>
    </form>

    {{-- DATA --}}
    @forelse($riwayat as $mapel => $kelasList)
        <h5 class="mt-4">{{ $mapel }}</h5>

        @foreach($kelasList as $kelas => $absensi)
            <div class="card shadow-sm mb-3">
                <div class="card-header fw-semibold">
                    Kelas {{ $kelas }}
                </div>
                <div class="card-body p-0">
                    <table class="table table-sm table-bordered text-center mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Tanggal</th>
                                <th>Hadir</th>
                                <th>Izin</th>
                                <th>Sakit</th>
                                <th>Alpha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $absensi->first()->tanggal }}</td>
                                <td>{{ $absensi->where('status','hadir')->count() }}</td>
                                <td>{{ $absensi->where('status','izin')->count() }}</td>
                                <td>{{ $absensi->where('status','sakit')->count() }}</td>
                                <td>{{ $absensi->where('status','alpha')->count() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    @empty
        <div class="alert alert-secondary">
            Pilih guru untuk melihat riwayat mengajar.
        </div>
    @endforelse

</div>
@endsection
