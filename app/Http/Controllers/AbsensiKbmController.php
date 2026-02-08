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
     * Tampilkan daftar absensi KBM untuk jadwal tertentu
     */
    public function index($jadwalId)
    {
        $jadwal = JadwalMengajar::with([
            'kelas.users',
            'mapel',
            'absensiKbm'
        ])->findOrFail($jadwalId);

        // Tambahkan default supaya Blade form rekap tidak error
        $tipe = 'minggu';
        $start = \Carbon\Carbon::now();

        return view('pages.guru.absensi_kbm.index', compact('jadwal', 'tipe', 'start'));
    }

    /**
     * Simpan atau update absensi KBM
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jadwal_mengajar_id' => 'required|exists:jadwal_mengajar,id',
            'siswa_id' => 'required|exists:users,id',
            'status' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        // Ambil jadwal
        $jadwal = JadwalMengajar::findOrFail($request->jadwal_mengajar_id);

        // Waktu sekarang
        $now = Carbon::now();

        // Validasi hari
        $hariSekarang = $now->translatedFormat('l'); // contoh: 'Monday'
        $hariJadwal = $jadwal->hari; // misal 'Senin'

        // Jika hari sekarang tidak sama dengan hari jadwal
        if (strtolower($hariSekarang) !== strtolower($hariJadwal)) {
            return back()->with('error', 'Belum saatnya mengajar. Hari KBM adalah ' . $jadwal->hari);
        }

        // Format jam mulai & selesai
        $jamMulai = Carbon::createFromFormat('H:i:s', $jadwal->jam_mulai);
        $jamSelesai = Carbon::createFromFormat('H:i:s', $jadwal->jam_selesai);

        // Validasi jam absen
        if ($now->lt($jamMulai) || $now->gt($jamSelesai)) {
            return back()->with('error', 'Belum saatnya mengajar. Absensi hanya bisa dilakukan antara '
                . $jadwal->jam_mulai . ' - ' . $jadwal->jam_selesai);
        }

        // Simpan atau update absensi
        AbsensiKbm::updateOrCreate(
            [
                'jadwal_mengajar_id' => $request->jadwal_mengajar_id,
                'siswa_id' => $request->siswa_id,
                'tanggal' => $now->toDateString(),
            ],
            [
                'status' => $request->status,
                'jam_absen' => $now->format('H:i:s'),
            ]
        );

        return back()->with('success', 'Absensi KBM berhasil disimpan');
    }
    public function rekap(Request $request)
    {
        $guruId = Auth::id();

        // Tipe rekap: minggu atau bulan (default minggu)
        $tipe = $request->input('tipe', 'minggu');

        // Ambil range tanggal
        if ($tipe === 'bulan') {
            $start = Carbon::now()->startOfMonth();
            $end = Carbon::now()->endOfMonth();

            if ($request->filled('bulan')) {
                $start = Carbon::parse($request->bulan . '-01')->startOfMonth();
                $end = Carbon::parse($request->bulan . '-01')->endOfMonth();
            }
        } else { // minggu
            $start = Carbon::now()->startOfWeek();
            $end = Carbon::now()->endOfWeek();

            if ($request->filled('tanggal')) {
                $start = Carbon::parse($request->tanggal)->startOfWeek();
                $end = Carbon::parse($request->tanggal)->endOfWeek();
            }
        }

        // Ambil jadwal guru
        $jadwals = JadwalMengajar::with(['kelas.users', 'mapel', 'absensiKbm'])
            ->where('guru_id', $guruId)
            ->get();

        $rekap = [];

        foreach ($jadwals as $jadwal) {
            foreach ($jadwal->kelas->users as $siswa) {
                $absensi = $jadwal->absensiKbm()
                    ->where('siswa_id', $siswa->id)
                    ->whereBetween('tanggal', [$start->toDateString(), $end->toDateString()])
                    ->get();

                $rekap[$jadwal->mapel->nama_mapel ?? 'Mapel belum diset'][$siswa->username] = $absensi;
            }
        }

        return view('pages.guru.absensi_kbm.rekap', compact('rekap', 'tipe', 'start', 'end'));
    }
    public function riwayat(Request $request)
    {
        $guruId = Auth::id();

        // Ambil periode filter, default 1 bulan terakhir
        $start = Carbon::parse($request->start ?? now()->subMonth());
        $end = Carbon::parse($request->end ?? now());

        // Ambil semua jadwal guru
        $jadwals = JadwalMengajar::with(['kelas', 'mapel', 'absensiKbm.siswa'])
            ->where('guru_id', $guruId)
            ->get();

        $riwayat = [];

        foreach ($jadwals as $jadwal) {
            $absensi = $jadwal->absensiKbm()
                ->whereBetween('tanggal', [$start->toDateString(), $end->toDateString()])
                ->get();

            if ($absensi->count() > 0) {
                $riwayat[$jadwal->mapel->nama_mapel ?? 'Mapel belum diset'][$jadwal->kelas->kelas] = $absensi;
            }
        }

        return view('pages.guru.riwayat', compact('riwayat', 'start', 'end'));
    }
}
