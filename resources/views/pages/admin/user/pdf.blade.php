<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data User</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px 8px;
            text-align: center;
        }
        th {
            background-color: #e8f0fe;
            font-weight: bold;
        }
        td.text-start {
            text-align: left;
        }
        .badge {
            padding: 3px 6px;
            border-radius: 4px;
            font-size: 11px;
            color: #fff;
        }
        .bg-danger { background: #dc3545; }
        .bg-primary { background: #0d6efd; }
        .bg-success { background: #198754; }
        .bg-secondary { background: #6c757d; }
        .bg-warning { background: #ffc107; color: #000; }
    </style>
</head>
<body>
    <h2>Laporan Data User</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td class="text-start">{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @php
                            $roleColors = [
                                'admin' => 'bg-danger',
                                'guru' => 'bg-primary',
                                'siswa' => 'bg-success',
                            ];
                            $roleClass = $roleColors[$user->role->nama_role] ?? 'bg-secondary';
                        @endphp
                        <span class="badge {{ $roleClass }}">
                            {{ ucfirst($user->role->nama_role) }}
                        </span>
                    </td>
                    <td>
                        @if ($user->kehadiran->isNotEmpty())
                            @php $status = $user->kehadiran->last()->status; @endphp
                            @if ($status == 'hadir')
                                <span class="badge bg-success">Masuk</span>
                            @elseif($status == 'izin')
                                <span class="badge bg-warning">Izin</span>
                            @elseif($status == 'sakit')
                                <span class="badge bg-danger">Sakit</span>
                            @else
                                <span class="badge bg-secondary">Tanpa Keterangan</span>
                            @endif
                        @else
                            <span class="badge bg-secondary">Belum Ada Data</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
