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
    <h2>Detail Siswa - Kelas {{ $kelas->kelas }} ({{ $kelas->jurusan }})</h2>
    <p class="sub-header">Dicetak pada {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Siswa</th>
                <th>Email</th>
                <th>Absensi Hari Ini</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $i => $s)
                @php
                    $absenHariIni = $s->kehadiran->where('tanggal_kehadiran', date('Y-m-d'))->first();
                    $status = $absenHariIni->status ?? 'Belum Ada';
                @endphp
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td style="text-align: left;">{{ $s->username }}</td>
                    <td>{{ $s->email }}</td>
                    <td>
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
