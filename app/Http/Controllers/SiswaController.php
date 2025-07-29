<?php

namespace App\Http\Controllers;

use App\Models\kehadiran;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();

        $absenHariIni = Kehadiran::where('user_id', $user->id)
            ->whereDate('tanggal_kehadiran', now()->toDateString())
            ->first();

        $totalHadir = Kehadiran::where('user_id', $user->id)->where('status', 'Hadir')->count();
        $totalIzin = Kehadiran::where('user_id', $user->id)->where('status', 'Izin')->count();
        $totalSakit = Kehadiran::where('user_id', $user->id)->where('status', 'Sakit')->count();

        return view('pages.siswa.dashboard', compact(
            'absenHariIni',
            'totalHadir',
            'totalIzin',
            'totalSakit'
        ));
    }
    public function formAbsen()
    {
        $userId = auth()->id();
        $today = now()->toDateString();

        // Cek apakah sudah absen hari ini
        $sudahAbsen = Kehadiran::where('user_id', $userId)
            ->whereDate('tanggal_kehadiran', $today)
            ->exists();

        if ($sudahAbsen) {
            return back()->with('info', 'Kamu sudah absen hari ini!');
        }

        return view('pages.siswa.absen');
    }
    public function absen(Request $request)
    {
        $request->validate([
            'status' => 'required|in:Hadir,Izin,Sakit',
        ]);

        $userId = auth()->id();
        $today = now()->toDateString();

        // Simpan absensi
        Kehadiran::create([
            'user_id' => $userId,
            'tanggal_kehadiran' => $today,
            'status' => $request->status,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Absensi berhasil!');
    }
    public function riwayat(Request $request)
    {
        $userId = auth()->id();

        $riwayat = Kehadiran::where('user_id', $userId)
            ->orderByDesc('tanggal_kehadiran')
            ->paginate(10);

        return view('pages.siswa.riwayat', compact('riwayat'));
    }
}
