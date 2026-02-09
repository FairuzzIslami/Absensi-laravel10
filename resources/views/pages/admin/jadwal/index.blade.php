@extends('layout.layout')

@section('content')
<section>
    <div class="content pt-5 mt-4" id="mainContent">

        {{-- Judul --}}
        <h1 class="h3 mb-4">
            <i class="fa-solid fa-calendar-days"></i> Jadwal Mengajar
        </h1>

        {{-- Info Hari & Total --}}
        <div class="alert alert-info d-flex justify-content-between align-items-center shadow-sm">
            <span>
                <i class="fa-solid fa-calendar-day me-1"></i>
                <strong>Hari Ini:</strong>
                {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
            </span>
            <span class="badge bg-primary">
                Total Jadwal: {{ $jadwal->count() }}
            </span>
        </div>

        {{-- Tombol Tambah --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('jadwal.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i> Tambah Jadwal
            </a>
        </div>

        {{-- Table --}}
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-striped table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th class="text-start">Guru</th>
                        <th>Mapel</th>
                        <th>Kelas</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($jadwal as $i => $j)
                        <tr>
                            <td>{{ $i + 1 }}</td>

                            <td class="text-start">
                                {{ $j->guru->username }}
                            </td>

                            @php
                                $mapelColors = [
                                    'bg-primary',
                                    'bg-success',
                                    'bg-warning text-dark',
                                    'bg-danger',
                                    'bg-info text-dark',
                                    'bg-secondary',
                                    'bg-dark'
                                ];

                                $colorIndex = crc32($j->mapel->nama_mapel ?? 'x') % count($mapelColors);
                            @endphp

                            <td>
                                <span class="badge {{ $mapelColors[$colorIndex] }}">
                                    {{ $j->mapel->nama_mapel ?? '-' }}
                                </span>
                            </td>

                            <td>
                                {{ $j->kelas->kelas }} -
                                {{ strtoupper($j->kelas->jurusan) }}
                            </td>

                            @php
                                $hariColors = [
                                    'Senin'  => 'bg-primary',
                                    'Selasa' => 'bg-success',
                                    'Rabu'   => 'bg-warning text-dark',
                                    'Kamis'  => 'bg-danger',
                                    'Jumat'  => 'bg-secondary',
                                    'Sabtu'  => 'bg-info text-dark'
                                ];
                            @endphp

                            <td>
                                <span class="badge {{ $hariColors[$j->hari] ?? 'bg-light text-dark' }}">
                                    {{ $j->hari }}
                                </span>
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }} -
                                {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}
                            </td>

                            <td>
                                <div class="btn-group">
                                    {{-- Edit --}}
                                    <button class="btn btn-sm btn-outline-warning"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal-{{ $j->id }}"
                                        title="Edit Jadwal">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    {{-- Delete --}}
                                    <button type="button"
                                        class="btn btn-sm btn-outline-danger"
                                        title="Hapus"
                                        onclick="confirmDelete({{ $j->id }})">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <form id="delete-form-{{ $j->id }}"
                                        action="{{ route('jadwal.destroy', $j->id) }}"
                                        method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-muted text-center">
                                Belum ada jadwal mengajar
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                {{ $jadwal->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</section>

{{-- Modal Edit --}}
@foreach ($jadwal as $j)
    @include('pages.admin.jadwal.modal.edit', [
        'j'     => $j,
        'guru'  => $guru,
        'kelas' => $kelas,
        'mapel' => $mapel
    ])
@endforeach
@endsection
