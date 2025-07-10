
    <div class="modal fade" id="editModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('kehadiran.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan"
                                value="{{ $item->nama_kegiatan }}">
                            @error('nama_kegiatan')
                                <div class="text-danger small">
                                    {{ $message }} {{-- message nya dari validasi store --}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tgl_kegiatan" class="form-label">Tanggal Kegiatan</label> {{-- Year,month,days harus urut --}}
                            <input type="date" name="tgl_kegiatan" class="form-control" id="tgl_kegiatan"
                                value="{{ date('Y-m-d', strtotime($item->tgl_kegiatan)) }}">
                            @error('tgl_kegiatan')
                                <div class="text-danger small">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                         <div class="mb-3">
                            <label for="waktu_kegiatan" class="form-label">Waktu Kegiatan</label>
                            <input type="time" name="waktu_kegiatan" class="form-control" id="waktu_kegiatan"
                                value="{{ date('H:i', strtotime($item->waktu_kegiatan)) }}">
                            @error('waktu_kegiatan')
                                <div class="text-danger small">
                                    {{ $message }} {{-- message nya dari validasi store --}}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

