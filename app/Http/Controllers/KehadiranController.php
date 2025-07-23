<?php

namespace App\Http\Controllers;

use App\Models\kehadiran;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->input('tanggal', date('Y-m-d'));

        // Ambil kehadiran dengan relasi user
        $kehadiran = kehadiran::with('user')
            ->where('tanggal_kehadiran', $tanggal)
            ->get();

        return view('pages.admin.kehadiran.index', compact('kehadiran', 'tanggal'));
    }
}
