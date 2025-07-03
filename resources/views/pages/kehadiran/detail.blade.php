@extends('layout.layout')

@section('content')
    <h2 class="text-center fw-bold mt-3">Detail data kehadiran</h2>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>Nama kegiatan : {{$data->nama_kegiatan}}</h3>
                        <h3>Waktu Kegiatan : {{$data->waktu_kegiatan}}</h3>
                        <h3>Tanggal kegiatan : {{$data->tgl_kegiatan}}</h3>
                        <h3>Foto Kegiatan : {{$data->foto_kegiatan}}</h3>
                        <a href="{{'/kehadiran'}}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
