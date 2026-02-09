<?php

namespace App\Http\Controllers;

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

    $start = Carbon::parse($request->start ?? now()->subMonth())->startOfDay();
    $end   = Carbon::parse($request->end ?? now())->endOfDay();

    $jadwals = JadwalMengajar::with(['mapel', 'kelas', 'absensiKbm'])
        ->where('guru_id', $guruId)
        ->get();

    $riwayat = [];

    foreach ($jadwals as $jadwal) {

        $absensi = $jadwal->absensiKbm
            ->whereBetween('tanggal', [$start, $end]);

        if ($absensi->isEmpty()) continue;

        $mapel = optional($jadwal->mapel)->nama_mapel ?? 'Mapel Tidak Diketahui';
        $kelas = optional($jadwal->kelas)->kelas ?? 'Kelas Tidak Diketahui';

        $riwayat[$mapel][$kelas] = $absensi;
    }

    return view('pages.guru.riwayat', compact(
        'riwayat',
        'start',
        'end'
    ));
}

}
