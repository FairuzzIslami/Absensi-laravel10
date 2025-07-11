@extends('layout.layout')

@section('content')
    <section class="py-5">
        <h2 class="text-center fw-bold py-3">List Table Kehadiran</h2>
        <div class="container my-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h4 class="card-title fw-bold">List Kegiatan</h4>
                        </div>
                        <div class="col text-end">
                            <a href="{{ 'kehadiran/create' }}" class="btn btn-primary"><i class="fas fa-plus me-1"></i>Tambahkan Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Tanggal Kegiatan</t h>
                                <th scope="col">Waktu Kegiatan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        @if ($data->isempty())
                            <tr>
                                <td colspan="6" class="text-center">Belum Ada Data</td>
                            </tr>
                        @endif
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama_kegiatan }}</td>
                                    <td>{{ date('d-M-y', strtotime($item->tgl_kegiatan)) }}</td>
                                    <td>{{ date('H:i', strtotime($item->waktu_kegiatan)) }}</td>
                                    <td>
                                        <a href="" class="btn btn-outline-warning me-1" data-bs-toggle="modal"
                                                data-bs-target="#editModal-{{ $item->id }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" class="btn btn-outline-info me-1" data-bs-toggle="modal"
                                            data-bs-target="#detailModal-{{ $item->id }}"> <i
                                                class="fa-solid fa-circle-info"></i></a>
                                        <form id="delete-form-{{ $item->id }}"
                                            action="{{ route('kehadiran.destroy', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-outline-danger" type="button"
                                                onclick="confirmDelete({{ $item->id }})"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @include('pages.kehadiran.model.detail') {{-- include modal --}}
                                @include('pages.kehadiran.model.edit')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
