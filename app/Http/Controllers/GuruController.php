<?php

namespace App\Http\Controllers;

use App\Models\kehadiran;
use App\Models\Kelas;
use App\Models\KodeAbsensi;
use Barryvdh\DomPDF\Facade\Pdf;
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

        $bulanIni = date('m');
        $tahunIni = date('Y');

        $totalHadir = Kehadiran::where('user_id', auth()->id())
            ->whereMonth('tanggal_kehadiran', $bulanIni)
            ->whereYear('tanggal_kehadiran', $tahunIni)
            ->where('status', 'Hadir')
            ->count();

        $totalIzin = Kehadiran::where('user_id', auth()->id())
            ->whereMonth('tanggal_kehadiran', $bulanIni)
            ->whereYear('tanggal_kehadiran', $tahunIni)
            ->where('status', 'Izin')
            ->count();

        $totalSakit = Kehadiran::where('user_id', auth()->id())
            ->whereMonth('tanggal_kehadiran', $bulanIni)
            ->whereYear('tanggal_kehadiran', $tahunIni)
            ->where('status', 'Sakit')
            ->count();


        return view('pages.guru.dashboard', compact('absenHariIni', 'jumlahKelas', 'totalSiswa'
            ,'totalHadir','totalIzin','totalSakit'));
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
        if (!session('kode_absen_valid')) {
            return redirect()->route('guru.kode.cek')->with('error', 'Silakan masukkan kode absensi terlebih dahulu.');
        }
        $absenHariIni = Kehadiran::where('user_id', auth()->id())
            ->where('tanggal_kehadiran', date('Y-m-d'))
            ->first();

        // jiak sudah mengisi bakal ada swet alert
        if ($absenHariIni) {
            return back()->with('info', 'Anda sudah melakukan absensi hari ini.');
        }
        return view('pages.guru.absensi.create', compact('absenHariIni'));
    }

    public function storeAbsensi(Request $request)
    {
        $request->validate([
            'tanggal_kehadiran' => 'required|date',
            'status'            => 'required|string',
        ], [
            'tanggal_kehadiran.required' => 'Tanggal kehadiran wajib dipilih.',
            'tanggal_kehadiran.date'     => 'Tanggal kehadiran harus berupa tanggal yang valid.',
            'status.required'            => 'Status kehadiran wajib dipilih.',
            'status.string'              => 'Status kehadiran harus berupa teks yang valid.',
        ]);

        Kehadiran::updateOrCreate(
            [
                'user_id'           => auth()->id(),
                'tanggal_kehadiran' => $request->tanggal_kehadiran,
            ],
            [
                'status' => $request->status,
            ]
        );
        session()->forget('kode_absen_valid_guru');

        return redirect()->route('guru.index')->with('success', 'Absensi Anda berhasil disimpan!');
    }

    public function riwayat()
    {
        $riwayat = Kehadiran::where('user_id', auth()->id())
            ->orderBy('tanggal_kehadiran', 'desc')
            ->paginate(10);

        return view('pages.guru.absensi.riwayat', compact('riwayat'));
    }
    public function exportPdf(Request $request, $id)
    {
        $search = $request->input('search');
        $kelas = Kelas::findOrFail($id);

        $query = $kelas->users()->with('kehadiran');
        if ($search) {
            $query->where('username', 'like', "%{$search}%");
        }
        $siswa = $query->get();

        $pdf = Pdf::loadView('pages.guru.kelas.pdf', compact('kelas', 'siswa'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('detail-siswa-kelas-' . $kelas->kelas . '.pdf');
    }
    public function exportCsv(Request $request, $id)
    {
        $search = $request->input('search');
        $kelas = Kelas::findOrFail($id);

        $query = $kelas->users()->with('kehadiran');
        if ($search) {
            $query->where('username', 'like', "%{$search}%");
        }
        $siswa = $query->get();

        $filename = 'detail-siswa-kelas-' . $kelas->kelas . '.csv';

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['No', 'Nama Siswa', 'Email', 'Absensi Hari Ini'];

        $callback = function () use ($siswa, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($siswa as $index => $s) {
                $absenHariIni = $s->kehadiran
                    ->where('tanggal_kehadiran', date('Y-m-d'))
                    ->first();
                $status = $absenHariIni->status ?? 'Belum Ada';

                fputcsv($file, [
                    $index + 1,
                    $s->username,
                    $s->email,
                    $status
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
    public function formKodeAbsen()
    {

        $userId = auth()->id();
        $today = now()->toDateString();

        $sudahAbsen = Kehadiran::where('user_id', $userId)
            ->whereDate('tanggal_kehadiran', $today)
            ->exists();

        if ($sudahAbsen) {
            return redirect()->route('guru.index')->with('info', 'Anda sudah absen hari ini!');
        }

        return view('pages.guru.kode.kode-absen'); // ganti sesuai lokasi blade kamu
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
            ->where('untuk_role', 'guru') // Hanya untuk guru
            ->where('tanggal', now()->toDateString())
            ->first();

        if (!$kode) {
            return back()->with('error', 'Kode tidak valid atau sudah kedaluwarsa.');
        }

        session(['kode_absen_valid' => true]); // Tanda sudah lolos
        return redirect()->route('guru.absensi')->with('success', 'Kode berhasil! Silakan isi absensi.');
    }
    public function absenSiswa(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'tanggal_kehadiran' => 'required|date',
            'status' => 'required'
        ]);

        Kehadiran::updateOrCreate(
            [
                'user_id' => $request->user_id,
                'tanggal_kehadiran' => $request->tanggal_kehadiran
            ],
            [
                'status' => $request->status
            ]
        );

        return back()->with('success', 'Absensi siswa berhasil diperbarui.');
    }
    public function jadwalMengajar()
    {
        $guruId = auth()->id();

        $jadwal = \App\Models\JadwalMengajar::with('kelas')
            ->where('guru_id', $guruId)
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        return view('pages.guru.jadwal.index', compact('jadwal'));
    }

}
