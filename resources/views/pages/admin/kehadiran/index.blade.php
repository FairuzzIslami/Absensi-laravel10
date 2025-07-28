@extends('layout.layout')

@section('content')
    <div class="content mt-4 py-5" id="mainContent">
        <h3 class="mb-4">
            <i class="fas fa-clipboard-check"></i> Data Kehadiran
        </h3>

        <!-- Baris Atas: Filter & Export -->
        <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap gap-2">
            <!-- Form Filter -->
            <form method="GET" action="{{ route('admin.kehadiran.index') }}" class="d-flex gap-2">
                <input type="date" name="tanggal" class="form-control form-control-sm" value="{{ $tanggal }}"
                    style="width: 180px;">
                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="fas fa-search"></i> Filter
                </button>
            </form>

            <!-- Export Buttons -->
            <div class="d-flex gap-2">
                <a href="{{ route('admin.kehadiran.export', ['tanggal' => $tanggal]) }}" class="btn btn-danger">
                    <i class="bi bi-file-earmark-pdf-fill"></i> Export PDF
                </a>
            </div>
        </div>

        <!-- Tabel Kehadiran -->
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-striped table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th>Status Kehadiran</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kehadiran as $index => $k)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $k->user->username }}</td>
                            <td>
                                @php
                                    $roleColors = [
                                        'admin' => 'bg-danger',
                                        'guru' => 'bg-primary',
                                        'siswa' => 'bg-success',
                                    ];
                                    $roleClass = $roleColors[$k->user->role->nama_role] ?? 'bg-secondary';
                                @endphp
                                <span class="badge {{ $roleClass }} px-3 py-2">
                                    {{ ucfirst($k->user->role->nama_role) }}
                                </span>
                            </td>
                            <td>
                                @php
                                    $badgeClass =
                                        [
                                            'hadir' => 'bg-success',
                                            'izin' => 'bg-warning text-dark',
                                            'sakit' => 'bg-info text-dark',
                                            'alpa' => 'bg-danger',
                                        ][$k->status] ?? 'bg-secondary';
                                @endphp
                                <span class="badge {{ $badgeClass }} px-3 py-2">
                                    {{ ucfirst($k->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted py-3">
                                <i class="fas fa-info-circle me-1"></i> Tidak ada data kehadiran untuk tanggal ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
