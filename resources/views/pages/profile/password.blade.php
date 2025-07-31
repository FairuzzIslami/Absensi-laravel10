@extends('layout.layout')

@section('content')
    <div class="content mt-5 py-4" id="mainContent">
        <h3><i class="bi bi-key-fill"></i> Ubah Password</h3>

        <div class="card shadow-sm mt-3">
            <div class="card-body">
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf

                    <!-- Password Lama -->
                    <div class="mb-3">
                        <label class="form-label">Password Lama</label>
                        <div class="input-group">
                            <input type="password" name="current_password"
                                class="form-control @error('current_password') is-invalid @enderror"
                                placeholder="Masukkan Password Lama">
                            <span class="input-group-text toggle-password">
                                <i class="fa fa-eye"></i>
                            </span>
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Password Baru -->
                    <div class="mb-3">
                        <label class="form-label">Password Baru</label>
                        <div class="input-group">
                            <input type="password" name="new_password"
                                class="form-control @error('new_password') is-invalid @enderror"
                                placeholder="Masukkan Password Baru">
                            <span class="input-group-text toggle-password">
                                <i class="fa fa-eye"></i>
                            </span>
                            @error('new_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Konfirmasi Password Baru -->
                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password Baru</label>
                        <div class="input-group">
                            <input type="password" name="new_password_confirmation"
                                class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                placeholder="Konfirmasi Password Baru">
                            <span class="input-group-text toggle-password">
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>
                        @error('new_password_confirmation')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-check"></i> Ubah Password
                    </button>
                    <a href="{{ route('profile') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
