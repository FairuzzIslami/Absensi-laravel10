<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\KehadiranDetail;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kehadiran::get();
        return view('pages.kehadiran.index')->with('data', $data);
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
        $request->validate(
            [
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
        } else {
            $fileName = 'nophoto.jpg';
        }
        // buat data
        $data = Kehadiran::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tgl_kegiatan' => $request->tgl_kegiatan,
            'foto_kegiatan' => $fileName,
            'waktu_kegiatan' => $request->waktu_kegiatan
        ]);

        return redirect()->route('kehadiran.index', compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = kehadiran::findOrfail($id);
        $kehadiranDetail = KehadiranDetail::where('kehadiran_id',$id)->get();
        return view('pages.kehadiran.detail.index',compact('data','kehadiranDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Kehadiran::find($id)->first();
        return view('pages.kehadiran.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_kegiatan' => 'required|string',
                'waktu_kegiatan' => 'required',
                'tgl_kegiatan' => 'required',
                'foto_kegiatan' => 'required',
            ]
        );

        if ($request->hasFile('foto_kegiatan')) {
            $fileName = 'foto-' . uniqid() . '.' . $request->file('foto_kegiatan')->extension();
            $request->file('foto_kegiatan')->move(public_path('image'), $fileName);
        } else {
            $fileName = 'nophoto.jpg';
        }

        $data = new Kehadiran();
        $data = Kehadiran::findOrFail($id);
        $data->nama_kegiatan = $request->nama_kegiatan;
        $data->tgl_kegiatan = $request->tgl_kegiatan;
        $data->foto_kegiatan = $fileName;
        $data->waktu_kegiatan = $request->waktu_kegiatan;
        $data->save();

        return redirect()->route('kehadiran.index');
    }

    /**
     *  Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kehadiran::where('id',$id);
        $data->delete();

        return redirect()->route('kehadiran.index');
    }
}
