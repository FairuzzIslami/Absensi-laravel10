@extends('layout.layout')

@section('content')
<section class="content mt-5" id="mainContent">
    <h2 class="mt-3 mb-3"><i class="fa-solid fa-key me-2"></i>Massukan Kode Absensi</h2>
    <div class="">

        {{-- Info box untuk petunjuk penggunaan --}}
        <div class="card mb-4 border-start border-4 border-info shadow-sm">
            <div class="card-body">
                <p class="text-muted mb-0">
                    Silakan masukkan <strong>kode absensi</strong> yang telah di berikan oleh admin untuk melakukan pengecekan.
                    Pastikan kode yang dimasukkan valid dan sesuai.
                    <br><br>
                    Jika Anda belum memiliki kode, silakan minta ke admin untuk kode absensi.
                </p>
            </div>
        </div>

        {{-- Form card --}}
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
                        <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" placeholder="Contoh: ABCD">
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
        <div class="text-center mt-4 text-muted small">
            <i class="fa-solid fa-circle-info me-1"></i>
            Jika Anda mengalami kendala, silakan hubungi admin sistem.
        </div>
    </div>
</section>
@endsection
