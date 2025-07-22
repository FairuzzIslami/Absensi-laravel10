<?php

namespace App\Http\Controllers;

use App\Models\kehadiran;
use App\Models\Kelas;
use Illuminate\Http\Request;

class GuruController extends Controller
{

    public function index()
    {
        $absenHariIni = Kehadiran::where('user_id', auth()->id())
            ->where('tanggal_kehadiran', date('Y-m-d'))
            ->first();

        $jumlahKelas = Kelas::count();
        $totalSiswa  = \App\Models\User::where('id_role', 3)->count(); // role 3 = siswa

        return view('pages.guru.dashboard', compact('absenHariIni', 'jumlahKelas', 'totalSiswa'));
    }


    // Daftar kelas dengan search + pagination
    public function kelas(Request $request)
    {
        $search = $request->input('search');

        // Query kelas + hitung jumlah user
        $query = Kelas::withCount('users');

        // Filter pencarian
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('kelas', 'like', "%{$search}%")
                    ->orWhere('jurusan', 'like', "%{$search}%");
            });
        }

        // Pagination 5 data per halaman
        $kelas = $query->paginate(5)->withQueryString();

        return view('pages.guru.kelas.index', compact('kelas'));
    }

    // Detail siswa pada kelas tertentu
    public function detailSiswa(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        // Query siswa dengan relasi kehadiran
        $query = $kelas->users()->with('kehadiran');

        // Pencarian nama siswa
        if ($request->filled('search')) {
            $query->where('username', 'like', "%{$request->search}%");
        }

        // Paginate siswa
        $siswa = $query->paginate(5)->withQueryString();

        return view('pages.guru.kelas.detail', compact('kelas', 'siswa'));
    }

    public function absensi()
    {
        $absenHariIni = Kehadiran::where('user_id', auth()->id())
            ->where('tanggal_kehadiran', date('Y-m-d'))
            ->first();

        return view('pages.guru.absensi.index', compact('absenHariIni'));
    }

    public function storeAbsensi(Request $request)
    {
        $request->validate([
            'tanggal_kehadiran' => 'required|date',
            'status' => 'required|string',
        ]);

        Kehadiran::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'tanggal_kehadiran' => $request->tanggal_kehadiran,
            ],
            [
                'status' => $request->status
            ]
        );

        return redirect()->route('guru.index')->with('success', 'Absensi Anda berhasil disimpan!');
    }
    public function riwayat()
    {
        $riwayat = Kehadiran::where('user_id', auth()->id())
            ->orderBy('tanggal_kehadiran', 'desc')
            ->paginate(10);

        return view('pages.guru.riwayat', compact('riwayat'));
    }
}
