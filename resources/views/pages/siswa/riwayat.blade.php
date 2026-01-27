@extends('layout.layout')

@section('content')
    <section>
        <div class="content pt-5 mt-4" id="mainContent">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h4 mb-0">
                    <i class="fa-solid fa-clock-rotate-left"></i> Riwayat Absensi
                </h1>
                <a href="{{ route('siswa.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </div>

            <!-- Badge Tanggal Hari Ini -->
            <div class="alert alert-info d-flex justify-content-between align-items-center shadow-sm">
                <span>
                    <i class="fa-solid fa-calendar-day me-1"></i>
                    <strong>Hari Ini:</strong> {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                </span>
                <span class="badge bg-primary">
                    Total Data: {{ $riwayat->total() }}
                </span>
            </div>

            <!-- Tabel Riwayat -->
            <div class="table-responsive shadow-sm rounded">
                <table class="table table-striped table-hover align-middle text-center responsive-table">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($riwayat as $index => $r)
                            <tr>
                                <td data-label="#">{{ $riwayat->firstItem() + $index }}</td>
                                <td data-label="Tanggal">
                                    <span class="badge bg-light text-dark border">
                                        <i class="fa-solid fa-calendar-day text-primary"></i>
                                        {{ \Carbon\Carbon::parse($r->tanggal_kehadiran)->translatedFormat('d M Y') }}
                                    </span>
                                </td>
                                @php
                                    $status = ucfirst(strtolower($r->status));
                                    $badgeClass = match ($status) {
                                        'Hadir' => 'bg-success',
                                        'Izin' => 'bg-warning text-dark',
                                        'Sakit' => 'bg-info text-dark',
                                        'Alpa' => 'bg-danger',
                                        default => 'bg-secondary',
                                    };
                                @endphp
                                <td data-label="Status">
                                    <span class="badge {{ $badgeClass }}">
                                        {{ $status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-muted">Belum ada riwayat absensi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginate -->
            @if ($riwayat->hasPages())
                <div class="mt-3">
                    {{ $riwayat->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
