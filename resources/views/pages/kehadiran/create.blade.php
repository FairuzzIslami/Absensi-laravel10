@extends('layout.layout')

@section('content')
    <h1 class="text-center fw-bold py-3">Tambahkan Data Kehadiran</h1>
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h4 class="card-title fw-bold">List Kegiatan</h4>
                    </div>
                    <div class="col text-end">
                        <a href="{{ '/kehadiran' }}" class="btn btn-secondary">kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                    <tbody>
                        <form action="{{'/kehadiran'}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" value="{{old('nama_kegiatan')}}">
                                @error('nama_kegiatan')
                                <div class="text-danger small">
                                    {{$message}} {{-- message nya dari validasi store --}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tgl_kegiatan" class="form-label">Tanggal Kegiatan</label>
                                <input type="date" name="tgl_kegiatan" class="form-control" id="tgl_kegiatan" value="{{old('tgl_kegiatan')}}">
                                @error('tgl_kegiatan')
                                    <div class="text-danger small">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="waktu_kegiatan" class="form-label">Waktu Kegiatan</label>
                                <input type="time" name="waktu_kegiatan" class="form-control" id="waktu_kegiatan" value="{{old('waktu_kegiatan')}}">
                                @error('waktu_kegiatan')
                                    <div class="text-danger small">
                                        {{$message}}    {{-- message nya dari validasi store --}}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </tbody>
            </div>
        </div>
    </div>
@endsection
