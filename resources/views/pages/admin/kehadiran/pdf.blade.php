<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        h2 {
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 5px;
            font-size: 16px;
            color: #2c3e50;
        }

        p.sub-header {
            text-align: center;
            font-size: 11px;
            margin-bottom: 10px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            border: 1px solid #999;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 6px 8px;
            text-align: center;
            vertical-align: middle;
        }

        th {
            background-color: #2c3e50;
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .footer {
            margin-top: 20px;
            font-size: 11px;
            text-align: right;
            color: #777;
        }
    </style>
</head>

<body>
    <h2>Data Kehadiran Siswa</h2>
    <p class="sub-header">Tanggal: {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }} |
        Dicetak pada {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Siswa</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status Kehadiran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kehadiran as $i => $data)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td style="text-align: left;">{{ $data->user->username }}</td>
                    <td>{{ $data->user->email }}</td>
                    <td>{{ $data->user->role->nama_role }}</td>
                    <td>
                        @php
                            $status = $data->status ?? 'Belum Ada';
                        @endphp

                        @if ($status === 'Hadir')
                            <span style="color: green; font-weight: bold;">{{ $status }}</span>
                        @elseif($status === 'Izin')
                            <span style="color: orange; font-weight: bold;">{{ $status }}</span>
                        @elseif($status === 'Sakit')
                            <span style="color: blue; font-weight: bold;">{{ $status }}</span>
                        @else
                            <span style="color: red; font-weight: bold;">{{ $status }}</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="footer">© {{ date('Y') }} Sistem E-Absensi Sekolah</p>
</body>

</html>
