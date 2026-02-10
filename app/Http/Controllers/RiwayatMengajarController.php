<?php

namespace App\Http\Controllers;

use App\Models\AbsensiKbm;
use App\Models\JadwalMengajar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RiwayatMengajarController extends Controller
{
    // ================= ADMIN =================
    public function adminIndex(Request $request)
    {
        $guruId = $request->guru_id;

        $start = Carbon::parse($request->start ?? now()->subMonth());
        $end   = Carbon::parse($request->end ?? now());

        $guruList = User::whereHas(
            'role',
            fn($q) =>
            $q->where('nama_role', 'guru')
        )->get();

        $riwayat = [];

        if ($guruId) {
            $jadwals = JadwalMengajar::with(['kelas', 'mapel', 'absensiKbm'])
                ->where('guru_id', $guruId)
                ->get();

            foreach ($jadwals as $jadwal) {
                $absensi = $jadwal->absensiKbm()
                    ->whereBetween('tanggal', [$start, $end])
                    ->get();

                if ($absensi->isNotEmpty()) {
                    $riwayat[$jadwal->mapel->nama_mapel ?? 'Mapel'][$jadwal->kelas->kelas] = $absensi;
                }
            }
        }

        return view('pages.admin.riwayat.index', compact(
            'guruList',
            'guruId',
            'riwayat',
            'start',
            'end'
        ));
    }

    // ================= GURU =================
    public function guruIndex(Request $request)
    {
        $guruId = Auth::id();

        $start = $request->start
            ? Carbon::parse($request->start)
            : Carbon::now()->startOfMonth();

        $end = $request->end
            ? Carbon::parse($request->end)
            : Carbon::now()->endOfMonth();

        $jadwals = JadwalMengajar::with(['mapel', 'kelas'])
            ->where('guru_id', $guruId)
            ->get();

        $riwayat = collect();

        foreach ($jadwals as $jadwal) {


            $absensis = AbsensiKbm::where('jadwal_mengajar_id', $jadwal->id)
                ->whereBetween('tanggal', [$start, $end])
                ->get()
                ->groupBy('tanggal');

            foreach ($absensis as $tanggal => $items) {
                $riwayat->push([
                    'mapel' => $jadwal->mapel->nama_mapel ?? '-',
                    'kelas' => $jadwal->kelas->kelas ?? '-',
                    'tanggal' => $tanggal,
                    'jam_mulai' => $jadwal->jam_mulai,
                    'jam_selesai' => $jadwal->jam_selesai,
                    'hadir' => $items->where('status', 'hadir')->count(),
                    'izin' => $items->where('status', 'izin')->count(),
                    'sakit' => $items->where('status', 'sakit')->count(),
                    'alpha' => $items->where('status', 'alpha')->count(),
                ]);
            }
        }

        return view('pages.guru.riwayat', compact('riwayat', 'start', 'end'));
    }
}
