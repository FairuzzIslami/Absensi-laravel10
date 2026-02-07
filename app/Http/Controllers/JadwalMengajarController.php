<?php

namespace App\Http\Controllers;

use App\Models\JadwalMengajar;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;

class JadwalMengajarController extends Controller
{
    public function index()
    {
        $jadwal = JadwalMengajar::with(['guru', 'kelas', 'mapel'])
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        $guru = User::whereHas('role', function ($q) {
            $q->where('nama_role', 'guru');
        })->get();

        $kelas = Kelas::all();
        $mapel = Mapel::all();

        return view('pages.admin.jadwal.index', compact(
            'jadwal',
            'guru',
            'kelas',
            'mapel'
        ));
    }

    public function create()
    {
        $guru = User::whereHas('role', function ($q) {
            $q->where('nama_role', 'guru');
        })->get();

        $kelas = Kelas::all();
        $mapel = Mapel::all();

        return view('pages.admin.jadwal.create', compact(
            'guru',
            'kelas',
            'mapel'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id'     => 'required|exists:users,id',
            'mapel_id'    => 'required|exists:mapel,id',
            'kelas_id'    => 'required|exists:kelas,id_kelas',
            'hari'        => 'required',
            'jam_mulai'   => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ], [
            'guru_id.required'     => 'Guru wajib dipilih.',
            'mapel_id.required'    => 'Mapel wajib dipilih.',
            'kelas_id.required'    => 'Kelas wajib dipilih.',
            'jam_selesai.after'    => 'Jam selesai harus setelah jam mulai.',
        ]);

        // Cek jadwal bentrok (guru / kelas)
        $bentrok = JadwalMengajar::where('hari', $request->hari)
            ->where(function ($q) use ($request) {
                $q->where('kelas_id', $request->kelas_id)
                  ->orWhere('guru_id', $request->guru_id);
            })
            ->where(function ($q) use ($request) {
                $q->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])
                  ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai])
                  ->orWhere(function ($sub) use ($request) {
                      $sub->where('jam_mulai', '<=', $request->jam_mulai)
                          ->where('jam_selesai', '>=', $request->jam_selesai);
                  });
            })
            ->exists();

        if ($bentrok) {
            return back()
                ->withInput()
                ->with('error', 'Jadwal bentrok! Guru atau kelas sudah terpakai di jam tersebut.');
        }

        JadwalMengajar::create([
            'guru_id'     => $request->guru_id,
            'mapel_id'    => $request->mapel_id,
            'kelas_id'    => $request->kelas_id,
            'hari'        => $request->hari,
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'guru_id'     => 'required|exists:users,id',
            'mapel_id'    => 'required|exists:mapel,id',
            'kelas_id'    => 'required|exists:kelas,id_kelas',
            'hari'        => 'required',
            'jam_mulai'   => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        $bentrok = JadwalMengajar::where('id', '!=', $id)
            ->where('hari', $request->hari)
            ->where(function ($q) use ($request) {
                $q->where('kelas_id', $request->kelas_id)
                  ->orWhere('guru_id', $request->guru_id);
            })
            ->where(function ($q) use ($request) {
                $q->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])
                  ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai])
                  ->orWhere(function ($sub) use ($request) {
                      $sub->where('jam_mulai', '<=', $request->jam_mulai)
                          ->where('jam_selesai', '>=', $request->jam_selesai);
                  });
            })
            ->exists();

        if ($bentrok) {
            return back()
                ->withInput()
                ->with('error', 'Jadwal bentrok! Guru atau kelas sudah terpakai di jam tersebut.');
        }

        JadwalMengajar::findOrFail($id)->update([
            'guru_id'     => $request->guru_id,
            'mapel_id'    => $request->mapel_id,
            'kelas_id'    => $request->kelas_id,
            'hari'        => $request->hari,
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        JadwalMengajar::findOrFail($id)->delete();

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}
