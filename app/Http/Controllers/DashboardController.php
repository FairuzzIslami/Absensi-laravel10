<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        $totalGuru  = User::where('id_role', 2)->count();  // role guru = 2
        $totalSiswa = User::where('id_role', 3)->count();  // role siswa = 3
        $totalKelas = Kelas::count();

        return view('pages.admin.dashboardAdmin', compact('totalGuru', 'totalSiswa', 'totalKelas'));
    }
}
