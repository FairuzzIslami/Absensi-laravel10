<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.profile.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('pages.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'foto'     => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $user->username = $request->username;
        $user->email = $request->email;

        // Upload foto profil jika ada
        if ($request->hasFile('foto')) {
            $fotoName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads/profile'), $fotoName);
            $user->foto = 'uploads/profile/' . $fotoName;
        }

        $user = Auth::user();
        $user->save();

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function passwordForm()
    {
        return view('pages.profile.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|min:6|confirmed',
            'new_password_confirmation'  => 'required'
        ], [
            'current_password.required' => 'Password lama wajib diisi.',
            'new_password.required'     => 'Password baru wajib diisi.',
            'new_password.min'          => 'Password baru harus memiliki minimal 6 karakter.',
            'new_password.confirmed'    => 'Konfirmasi password baru tidak sesuai.',
             'new_password_confirmation.required' => 'Konfirmasi password baru wajib diisi.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
        }

        // Update password dan simpan
        $user->password = Hash::make($request->new_password);
        $user->save();  // save

        return redirect()->route('profile')->with('success', 'Password berhasil diubah.');
    }
}
