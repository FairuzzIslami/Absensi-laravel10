@extends('layout.layout')

@section('content')
    <h2 class="text-center fw-bold py-3">List Table Kehadiran</h2>
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h4 class="card-title fw-bold">List Kegiatan</h4>
                    </div>
                    <div class="col text-end">
                        <a href="{{ 'kehadiran/create' }}" class="btn btn-primary">+Tambahkan Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                
                @if ($data => isempty() )
                    <tr colspan = "5" class="text-center"></tr>
                @endif

                <table class="table table-striped" id="">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nama Kegiatan</th>
                            <th scope="col">Tanggal Kegiatan</th>
                            <th scope="col">Waktu Kegiatan</th>
                            <th scope="col">Foto Kegiatan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama_kegiatan }}</td>
                                <td>{{ date('d-M-y', strtotime($item->tgl_kegiatan)) }}</td>
                                <td>{{ date('H:i', strtotime($item->waktu_kegiatan)) }}</td>
                                <td>{{ $item->foto_kegiatan }}</td>
                                <td>
                                    <a href="{{ route('kehadiran.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('kehadiran.show', $item->id) }}" class="btn btn-info">Detail</a>
                                    <form action="{{ route('kehadiran.destroy', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger text-white" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
