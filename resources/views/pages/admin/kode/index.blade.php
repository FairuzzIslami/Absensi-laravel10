@extends('layout.layout')

@section('content')
    <div class="content mt-5" id="mainContent">
        <h4 class="mb-3"><i class="fas fa-key me-2"></i> Daftar Kode Kehadiran</h4>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('admin.kode.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle me-1"></i> Buat Kode Baru
            </a>
        </div>

        @if ($kodeAbsensi->count())
            <div class="row">
                @foreach ($kodeAbsensi as $kode)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-lg border-0 h-100 position-relative overflow-hidden">
                            <div class="position-absolute top-0 end-0  p-3">
                                <i class="fas fa-qrcode fa-5x "></i>
                            </div>
                            <div class="card-body position-relative">
                                <h5 class="card-title fw-bold text-primary mb-2">
                                    <i class="fas fa-key me-2"></i>{{ $kode->kode }}
                                </h5>
                                <ul class="list-unstyled small mb-3">
                                    <li><strong>Tanggal:</strong>
                                        {{ \Carbon\Carbon::parse($kode->tanggal)->translatedFormat('d F Y') }}</li>
                                    <li><strong>Untuk:</strong> <span class="text-capitalize">{{ $kode->untuk_role }}</span>
                                    </li>
                                    <li class="text-muted"><i class="fas fa-clock me-1"></i> Dibuat
                                        {{ $kode->created_at->diffForHumans() }}</li>
                                </ul>

                                <form id="delete-form-{{ $kode->id }}"
                                    action="{{ route('admin.kode.destroy', $kode->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <button class="btn btn-outline-danger w-100" onclick="confirmDelete({{ $kode->id }})">
                                    <i class="fas fa-trash-alt me-1"></i>
                                </button>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center mt-4">
                <i class="fas fa-info-circle me-1"></i> Belum ada kode kehadiran yang dibuat.
            </div>
        @endif
    </div>
@endsection
