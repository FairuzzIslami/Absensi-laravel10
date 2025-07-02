<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kehadiran::get();
        return view('pages.kehadiran.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kehadiran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string',
            'waktu_kegiatan' => 'required',
            'tgl_kegiatan' => 'required',
            'foto_kegiatan' => 'required',
        ],
        [
            'nama_kegiatan.required' => 'nama wajib di isi',
            'tgl_kegiatan.required' => 'tanggal kegiatan wajib di isi',
            'nama_kegiatan.string' => 'nama kegiatan wajib text',
        ]
    );
        if ($request->hasFile('foto_kegiatan')) {
            $fileName = 'foto-' . uniqid() . '.' . $request->file('foto_kegiatan')->extension();
            $request->file('foto_kegiatan')->move(public_path('image'), $fileName);
        }else{
            $fileName = 'nophoto.jpg';
        }

        $data = Kehadiran::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tgl_kegiatan' => $request->tgl_kegiatan. '' . $request->waktu_kegiatan,
            'foto_kegiatan' => $fileName
        ]);

        return redirect()->route('kehadiran.index',compact('data'));
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
        $data = Kehadiran::find($id);
        return view('pages.kehadiran.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
