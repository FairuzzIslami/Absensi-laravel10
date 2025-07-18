<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data user + role + kelas
        $users = User::with(['role', 'kelas'])->paginate(5);

        // Ambil semua role & kelas untuk dropdown modal edit
        $roles = Role::all();
        $kelas = Kelas::all();

        return view('pages.admin.user.index', compact('users', 'roles', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all(); // ambil admin, guru, siswa
        $kelas = Kelas::all(); // ambil kelas
        return view('pages.admin.user.create', compact('roles', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'username' => 'required|string|max:100',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'id_role' => 'required|exists:roles,role_id',
                'id_kelas' => 'nullable|exists:kelas,id_kelas'
            ],
            [
                'username.required' => 'Nama pengguna wajib diisi.',
                'username.string' => 'Nama pengguna harus berupa teks.',
                'username.max' => 'Nama pengguna maksimal 100 karakter.',

                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email ini sudah digunakan.',

                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal 6 karakter.',

                'id_role.required' => 'Role wajib dipilih.',
                'id_role.exists' => 'Role yang dipilih tidak valid.',

                'id_kelas.exists' => 'Kelas yang dipilih tidak valid.'
            ]
        );

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'id_role' => $request->id_role,
            'id_kelas' => $request->id_kelas
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
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
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate(
            [
                'username' => 'required|string|max:100',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|min:6', // password opsional
                'id_role' => 'required|exists:roles,role_id',
                'id_kelas' => 'nullable|exists:kelas,id_kelas'
            ],
            [
                'username.required' => 'Nama pengguna wajib diisi.',
                'username.string' => 'Nama pengguna harus berupa teks.',
                'username.max' => 'Nama pengguna maksimal 100 karakter.',

                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email ini sudah digunakan.',

                'password.min' => 'Password minimal 6 karakter.',

                'id_role.required' => 'Role wajib dipilih.',
                'id_role.exists' => 'Role yang dipilih tidak valid.',

                'id_kelas.exists' => 'Kelas yang dipilih tidak valid.'
            ]
        );

        // Update data
        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'id_role' => $request->id_role,
            'id_kelas' => $request->id_kelas
        ];

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $users = User::where('username', 'like', '%' . $search . '%')
                ->orderBy('username', 'asc')
                ->paginate(5);
        } else {
            $users = User::orderBy('username', 'asc')->paginate(5);
        }
        $roles = Role::all(); // ambil table role dan kelas  dari user
        $kelas = Kelas::all();
        return view('pages.admin.user.index', compact('users', 'search', 'roles', 'kelas'));
    }


    public function exportPdf(Request $request)
    {
        $search = $request->input('search');

        $query = User::with(['role', 'kelas']);

        if ($search) {
            $query->where('username', 'like', "%{$search}%");
        }

        $users = $query->get(); // Semua data tanpa pagination

        $pdf = Pdf::loadView('pdf.user', compact('users'))
            ->setPaper('a4', 'landscape'); // Bisa portrait juga

        return $pdf->download('data-user.pdf');
    }
    public function exportCsv()
    {
        $fileName = 'data-user.csv';
        $users = \App\Models\User::with('role')->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['No', 'Nama', 'Email', 'Role'];

        $callback = function () use ($users, $columns) {
            $file = fopen('php://output', 'w');
            // Tulis header kolom
            fputcsv($file, $columns);

            foreach ($users as $index => $user) {
                fputcsv($file, [
                    $index + 1,
                    $user->username,
                    $user->email,
                    ucfirst($user->role->nama_role)
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
