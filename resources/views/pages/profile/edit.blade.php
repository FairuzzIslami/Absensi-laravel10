@extends('layout.layout')

@section('content')
<div class="content mt-5 py-4">
    <h3><i class="bi bi-pencil-square"></i> Edit Profil</h3>
    <div class="card shadow-sm mt-3">
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Profil (Opsional)</label>
                    <input type="file" name="foto" class="form-control">
                    @if ($user->foto)
                        <img src="{{ asset($user->foto) }}" class="mt-2 rounded" alt="Foto Profil" width="100">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                <a href="{{ route('profile') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
