<?php

namespace App\Http\Controllers;

use App\Models\KodeAbsensi;
use Illuminate\Http\Request;

class KodeAbsensiController extends Controller
{
    public function index()
    {
        $kodeAbsensi = KodeAbsensi::orderBy('created_at', 'desc')->get();
        return view('pages.admin.kode.index', compact('kodeAbsensi'));
    }

    public function create()
    {
        return view('pages.admin.kode.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|unique:kode_absensi,kode',
            'tanggal' => 'required|date',
            'untuk_role' => 'required|in:guru,siswa',
        ], [
            'kode.required' => 'Kolom kode absensi wajib diisi.',
            'kode.string' => 'Kode absensi harus berupa teks.',
            'kode.unique' => 'Kode absensi ini sudah digunakan, silakan gunakan kode lain.',

            'tanggal.required' => 'Tanggal berlaku wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',

            'untuk_role.required' => 'Silakan pilih ditujukan untuk siapa kode ini.'
        ]);

        // Cek apakah sudah ada kode untuk tanggal dan role tersebut
        $cekSudahAda = KodeAbsensi::where('tanggal', $request->tanggal)
            ->where('untuk_role', $request->untuk_role)
            ->exists();

        if ($cekSudahAda) {
            return redirect()->back()->with('error', 'Kode absensi untuk tanggal dan role tersebut sudah dibuat.');
        }

        KodeAbsensi::create($request->all());

        return redirect()->route('admin.index')->with('success', 'Kode absensi berhasil dibuat.');
    }
    public function destroy($id)
    {
        $kode = KodeAbsensi::findOrFail($id);
        $kode->delete();

        return redirect()->route('admin.kode.index')->with('success', 'Kode absensi berhasil dihapus.');
    }
}
