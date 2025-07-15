@extends('layout.layout')

@section('content')
    <section class="py-5">
        <h2 class="text-center fw-bold py-3">List Table Kehadiran</h2>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="button" onclick="confirmLogout()" class="dropdown-item">
                <i class="fa-solid fa-sign-out-alt me-1"></i> Logout
            </button>
        </form>
        <div class="container my-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h4 class="card-title fw-bold">List Kegiatan</h4>
                        </div>
                        {{-- search --}}
                        <div class="col-md-4">
                            <form action="{{ route('search') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" placeholder="Cari kegiatan.." for="search"
                                        class="form-control">
                                    <button type="submit" class="btn btn-outline-secondary"><i
                                            class="fa-solid fa-magnifying-glass" id="search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col text-end">
                            <a href="{{ 'kehadiran/create' }}" class="btn btn-primary"><i
                                    class="fas fa-plus me-1"></i>Tambahkan Data</a>
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
                            <?php $i = $data->firstItem(); ?>
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
                                <?php $i++; ?>
                                @include('pages.kehadiran.model.detail') {{-- include modal --}}
                                @include('pages.kehadiran.model.edit')
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
