<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Query dasar
        $query = Kelas::query();

        // Jika ada pencarian
        if (!empty($search)) {
            $query->where('kelas', 'like', '%' . $search . '%')
                ->orWhere('jurusan', 'like', '%' . $search . '%');
        }

        // Ambil data dengan paginasi
        $kelas = $query->orderBy('kelas', 'asc')->paginate(5);

        // Kirim data ke view
        return view('pages.admin.kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required|in:10,11,12',
            'jurusan' => 'required|in:tkr,tsm,rpl,animasi,farmasi,tmi,tataboga'
        ], [
            'kelas.required' => 'Kelas wajib dipilih',
            'kelas.in' => 'Kelas yang dipilih tidak valid',
            'jurusan.required' => 'Jurusan wajib dipilih',
            'jurusan.in' => 'Jurusan yang dipilih tidak valid'
        ]);

        // Cek duplikat
        $cekDuplikat = Kelas::where('kelas', $request->kelas)
            ->where('jurusan', $request->jurusan)
            ->exists();

        if ($cekDuplikat) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['kelas' => 'Kelas dengan jurusan ini sudah dibuat.']);
        }

        // Simpan ke database
        Kelas::create([
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan
        ]);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'kelas' => 'required|in:10,11,12',
                'jurusan' => 'required|in:tkr,tsm,rpl,animasi,farmasi,tmi,tataboga'
            ],
            [
                'kelas.required' => 'Kelas Wajib di pilih',
                'kelas.in' => 'Kelas Yg di pilih tidak valid',

                'jurusan.required' => 'Jurusan Wajib di Pilih',
                'jurusan.in' => 'Kelas yg di pilih tidak valid'
            ]
        );

        $kelas = Kelas::findOrFail($id);

        $kelas->update([
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan
        ]);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari data kelas berdasarkan ID
        $kelas = Kelas::findOrFail($id);

        if ($kelas->users->count() > 0) {
            return redirect()->route('kelas.index')->with('error', 'Kelas tidak bisa dihapus karena masih ada siswa di dalamnya.');
        } else {
            $kelas->delete();
            return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus.');
        }
    }
}
