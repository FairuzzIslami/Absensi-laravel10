<?php

namespace App\Http\Controllers;

use App\Models\AbsensiKbm;
use App\Models\JadwalMengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AbsensiKbmController extends Controller
{
    /**
     * Tampilkan halaman absensi KBM
     */
    public function index($jadwalId)
    {
        $jadwal = JadwalMengajar::with([
            'kelas.users',
            'mapel',
            'absensiKbm'
        ])->findOrFail($jadwalId);

        // default untuk blade
        $tipe = 'minggu';
        $start = Carbon::now();

        return view('pages.guru.absensi_kbm.index', compact(
            'jadwal',
            'tipe',
            'start'
        ));
    }

    /**
     * Simpan / update absensi KBM
     */
    public function store(Request $request)
    {
        // ================= VALIDASI INPUT =================
        $request->validate([
            'jadwal_mengajar_id' => 'required|exists:jadwal_mengajar,id',
            'siswa_id'           => 'required|exists:users,id',
            'status'             => 'required|in:hadir,izin,sakit,alpha',
        ]);

        // ================= AMBIL JADWAL =================
        $jadwal = JadwalMengajar::with('kelas')->findOrFail(
            $request->jadwal_mengajar_id
        );

        // ================= WAKTU SEKARANG =================
        $now = Carbon::now();

        // ================= VALIDASI HARI =================
        $hariMap = [
            0 => 'Minggu',
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
        ];

        $hariSekarang = $hariMap[$now->dayOfWeek];
        $hariJadwal   = $jadwal->hari;

        if ($hariSekarang !== $hariJadwal) {
            return back()->with(
                'error',
                'Belum saatnya mengajar. Hari KBM adalah ' . $hariJadwal
            );
        }

        // ================= VALIDASI JAM =================
        $jamMulai = Carbon::today()
            ->setTimeFromTimeString($jadwal->jam_mulai);

        $jamSelesai = Carbon::today()
            ->setTimeFromTimeString($jadwal->jam_selesai);

        if ($now->lt($jamMulai) || $now->gt($jamSelesai)) {
            return back()->with(
                'error',
                'Absensi hanya bisa dilakukan antara '
                    . $jadwal->jam_mulai . ' - ' . $jadwal->jam_selesai
            );
        }

        // ================= SIMPAN ABSENSI =================
        AbsensiKbm::updateOrCreate(
            [
                'jadwal_mengajar_id' => $request->jadwal_mengajar_id,
                'siswa_id'           => $request->siswa_id,
                'tanggal'            => $now->toDateString(),
            ],
            [
                'status'    => $request->status,
                'jam_absen' => $now->format('H:i:s'),
            ]
        );

        return back()->with('success', 'Absensi KBM berhasil disimpan');
    }

    /**
     * Rekap absensi guru
     */
    public function rekap(Request $request)
    {
        $guruId = Auth::id();
        $tipe = $request->input('tipe', 'minggu');

        if ($tipe === 'bulan') {
            $start = Carbon::now()->startOfMonth();
            $end   = Carbon::now()->endOfMonth();

            if ($request->filled('bulan')) {
                $start = Carbon::parse($request->bulan . '-01')->startOfMonth();
                $end   = Carbon::parse($request->bulan . '-01')->endOfMonth();
            }
        } else {
            $start = Carbon::now()->startOfWeek();
            $end   = Carbon::now()->endOfWeek();

            if ($request->filled('tanggal')) {
                $start = Carbon::parse($request->tanggal)->startOfWeek();
                $end   = Carbon::parse($request->tanggal)->endOfWeek();
            }
        }

        $jadwals = JadwalMengajar::with([
            'kelas.users',
            'mapel',
            'absensiKbm'
        ])
            ->where('guru_id', $guruId)
            ->get();

        $rekap = [];

        foreach ($jadwals as $jadwal) {
            foreach ($jadwal->kelas->users as $siswa) {
                $absensi = $jadwal->absensiKbm()
                    ->where('siswa_id', $siswa->id)
                    ->whereBetween('tanggal', [
                        $start->toDateString(),
                        $end->toDateString()
                    ])
                    ->get();

                $rekap[$jadwal->mapel->nama_mapel ?? 'Mapel belum diset'][$siswa->username] = $absensi;
            }
        }

        return view('pages.guru.absensi_kbm.rekap', compact(
            'rekap',
            'tipe',
            'start',
            'end'
        ));
    }

    /**
     * Riwayat mengajar guru
     */
    public function riwayat(Request $request)
    {
        $guruId = Auth::id();

        $start = Carbon::parse($request->start ?? now()->subMonth())->startOfDay();
        $end   = Carbon::parse($request->end ?? now())->endOfDay();

        $jadwals = JadwalMengajar::with([
            'kelas',
            'mapel',
            'absensiKbm'
        ])
            ->where('guru_id', $guruId)
            ->get();

        $riwayat = [];

        foreach ($jadwals as $jadwal) {

            // ambil absensi sesuai range tanggal
            $absensiByTanggal = $jadwal->absensiKbm()
                ->whereBetween('tanggal', [
                    $start->toDateString(),
                    $end->toDateString()
                ])
                ->get()
                ->groupBy('tanggal');

            foreach ($absensiByTanggal as $tanggal => $items) {
                $riwayat[] = [
                    'mapel'   => $jadwal->mapel->nama_mapel ?? 'Mapel belum diset',
                    'kelas'   => $jadwal->kelas->kelas,
                    'tanggal' => $tanggal,
                    'hadir'   => $items->where('status', 'hadir')->count(),
                    'izin'    => $items->where('status', 'izin')->count(),
                    'sakit'   => $items->where('status', 'sakit')->count(),
                    'alpha'   => $items->where('status', 'alpha')->count(),
                ];
            }
        }

        $riwayat = collect($riwayat)
            ->sortByDesc('tanggal')
            ->values();

        return view('pages.guru.riwayat', compact(
            'riwayat',
            'start',
            'end'
        ));
    }
    public function simpanMateri(Request $request)
    {
        $request->validate([
            'jadwal_mengajar_id' => 'required|exists:jadwal_mengajar,id',
            'tanggal' => 'required|date',
            'materi' => 'nullable|string',
        ]);

        // update semua absensi di hari itu
        AbsensiKbm::where('jadwal_mengajar_id', $request->jadwal_mengajar_id)
            ->where('tanggal', $request->tanggal)
            ->update([
                'materi' => $request->materi
            ]);

        return back()->with('success', 'Materi KBM berhasil disimpan');
    }
}
