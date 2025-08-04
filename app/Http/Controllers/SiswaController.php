<?php

namespace App\Http\Controllers;

use App\Models\kehadiran;
use App\Models\KodeAbsensi;
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
        if (!session('kode_absen_valid')) {
            return redirect()->route('siswa.absen.kode')->with('error', 'Silakan masukkan kode absensi terlebih dahulu.');
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

        session()->forget('kode_absen_valid'); // hapus sesi

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

    public function formKodeAbsen()
    {
        $userId = auth()->id();
        $today = now()->toDateString();

        $sudahAbsen = Kehadiran::where('user_id', $userId)
            ->whereDate('tanggal_kehadiran', $today)
            ->exists();

        if ($sudahAbsen) {
            return redirect()->route('siswa.index')->with('info', 'Kamu sudah absen hari ini!');
        }

        return view('pages.siswa.kode.kode-absen');
    }
    public function cekKodeAbsen(Request $request)
    {
        $request->validate([
            'kode' => 'required|exists:kode_absensi,kode',
        ], [
            'kode.required' => 'Kode absensi wajib diisi.',
            'kode.exists'   => 'Kode absensi tidak ditemukan atau tidak valid.',
        ]);


        $kode = KodeAbsensi::where('kode', $request->kode)
            ->where('untuk_role', 'siswa') // Hanya untuk siswa
            ->where('tanggal', now()->toDateString()) // Hanya berlaku hari ini
            ->first();

        if (!$kode) {
            return back()->with('error', 'Kode tidak valid atau sudah kedaluwarsa.');
        }

        session(['kode_absen_valid' => true]); // Simpan ke session sebagai tanda lolos
        return redirect()->route('siswa.absen.form')->with('success', 'Kode berhasil! Silakan isi absensi.');
    }
}
