@extends('layout.layout')

@section('content')
<section class="content mt-5" id="mainContent">
    <div class="container">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fa-solid fa-key me-2"></i> Masukkan Kode Absensi</h5>
            </div>
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('guru.kode.cek') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Kode Absensi</label>
                        <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror">
                        @error('kode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary">
                            <i class="fa-solid fa-check me-1"></i> Cek Kode
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
