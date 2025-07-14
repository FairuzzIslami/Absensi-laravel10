<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('pages.auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],
        [
            'email.required' => 'email wajib di isi',
            'email.email' => 'email wajib menggunakan @',
            'password.required' => 'password wajib di isi'
        ]

    );

        if(Auth::attempt(['email' => $request->email,'password' =>$request->password])){
            return redirect()->route('kehadiran.index')->with('success','Anda berhasil login');
        }else{
            return back()->with('error','Email atau password salah');
        };
    }
}
