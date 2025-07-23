<?php

namespace App\Http\Controllers;

use App\Models\kehadiran;
use App\Models\Kelas;
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

            // jiak sudah mengisi bakal ada swet alert
        if ($absenHariIni) {
            return redirect()->route('guru.index')
                ->with('info', 'Anda sudah melakukan absensi hari ini.');
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
}
