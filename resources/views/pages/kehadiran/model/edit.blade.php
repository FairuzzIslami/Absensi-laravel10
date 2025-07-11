<div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="editModalLabel-{{ $item->id }}">
                    <i class="fas fa-pen-to-square me-2"></i> Edit Kegiatan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('kehadiran.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_kegiatan" class="form-label fw-semibold">
                            <i class="fas fa-bullhorn me-1"></i> Nama Kegiatan
                        </label>
                        <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan"
                            value="{{ $item->nama_kegiatan }}">
                        @error('nama_kegiatan')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tgl_kegiatan" class="form-label fw-semibold">
                            <i class="fas fa-calendar-day me-1"></i> Tanggal Kegiatan
                        </label>
                        <input type="date" name="tgl_kegiatan" class="form-control" id="tgl_kegiatan"
                            value="{{ date('Y-m-d', strtotime($item->tgl_kegiatan)) }}">
                        @error('tgl_kegiatan')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="waktu_kegiatan" class="form-label fw-semibold">
                            <i class="fas fa-clock me-1"></i> Waktu Kegiatan
                        </label>
                        <input type="time" name="waktu_kegiatan" class="form-control" id="waktu_kegiatan"
                            value="{{ date('H:i', strtotime($item->waktu_kegiatan)) }}">
                        @error('waktu_kegiatan')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" class="btn btn-outline-secondary me-2" data-bs-dismiss="modal">
                            <i class="fas fa-xmark me-1"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
