<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        // Jika user sudah login, arahkan sesuai role
        if (Auth::check()) {
            $role = strtolower(auth()->user()->role->nama_role);
            if ($role === 'admin') {
                return redirect()->route('admin.index')
                    ->with('success', 'Anda sudah login sebagai Admin');
            } elseif ($role === 'guru') {
                return redirect()->route('guru.index')
                    ->with('success', 'Anda sudah login sebagai Guru');
            } elseif ($role === 'siswa') {
                return redirect()->route('siswa.index')
                    ->with('success', 'Anda sudah login sebagai Siswa');
            } else {
                return redirect()->route('login.index')
                    ->with('error', 'Role tidak dikenali. Hubungi admin.');
            }   
        }



        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => 'email wajib di isi',
                'email.email' => 'email wajib menggunakan @',
                'password.required' => 'password wajib di isi'
            ]
        );
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user(); // Ambil user yang login

            // Redirect sesuai role
            if ($user->role->nama_role === 'admin') {
                return redirect()->route('admin.index')->with('success', 'Selamat datang, Admin!');
            } elseif ($user->role->nama_role === 'guru') {
                return redirect()->route('guru.index')->with('success', 'Selamat datang, Guru!');
            } elseif ($user->role->nama_role === 'siswa') {
                return redirect()->route('siswa.index')->with('success', 'Selamat datang, Siswa!');
            }

            // Jika role tidak dikenal
            Auth::logout();
            return back()->with('error', 'Role tidak valid.');
        } else {
            return back()->with('error', 'Email atau password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index')->with('success', 'Anda berhasil logout');
    }
}
