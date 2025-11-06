<?php

namespace App\Http\Controllers;

use App\Models\kehadiran;
use App\Models\Kelas;
use App\Models\KodeAbsensi;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Dashboard Admin
    public function dashboardAdmin(Request $request)
    {
        $today = Carbon::today();
        $totalGuru  = User::where('id_role', 2)->count();  // role guru = 2
        $totalSiswa = User::where('id_role', 3)->count();  // role siswa = 3
        $totalKelas = Kelas::count();
        $totalKehadiranHariIni = Kehadiran::whereDate('tanggal_kehadiran', $today)->count();

        $kodeHariIniSiswa = KodeAbsensi::whereDate('tanggal', $today)
            ->where('untuk_role', 'siswa') // 3 = siswa
            ->where('expired_at', '>=', now())
            ->first();  
        $kodeHariIniGuru = KodeAbsensi::whereDate('tanggal', $today)
            ->where('untuk_role', 'guru') // 2 = guru
            ->where('expired_at', '>=', now())
            ->first();

        $totalKehadiranHariIni = Kehadiran::whereDate('tanggal_kehadiran', $today)->count();
        return view('pages.admin.dashboardAdmin', compact('totalGuru', 'totalSiswa', 'totalKelas', 'totalKehadiranHariIni', 'totalKehadiranHariIni', 'kodeHariIniSiswa','kodeHariIniGuru'));
    }

    // Kehadiran Admin
    public function kehadiran(Request $request)
    {
        $tanggal = $request->input('tanggal', date('Y-m-d'));

        $kehadiran = kehadiran::with('user')
            ->where('tanggal_kehadiran', $tanggal)
            ->get();

        return view('pages.admin.kehadiran.index', compact('kehadiran', 'tanggal'));
    }
    public function exportPdfKehadiran(Request $request)
    {
        $tanggal = $request->input('tanggal', date('Y-m-d'));

        $kehadiran = kehadiran::with('user.role')
            ->where('tanggal_kehadiran', $tanggal)
            ->get();

        $pdf = Pdf::loadView('pages.admin.kehadiran.pdf', compact('kehadiran', 'tanggal'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-kehadiran-' . $tanggal . '.pdf');
    }
}
