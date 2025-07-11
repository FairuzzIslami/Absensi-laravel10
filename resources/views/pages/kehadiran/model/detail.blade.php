<div class="modal fade" id="detailModal-{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel-{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="detailModalLabel-{{ $item->id }}">
                    <i class="fas fa-circle-info me-2"></i> Detail Kegiatan
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label fw-bold"><i class="fas fa-bullhorn me-1"></i> Nama Kegiatan</label>
                    <div class="form-control bg-light">{{ $item->nama_kegiatan }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold"><i class="fas fa-calendar-day me-1"></i> Tanggal</label>
                    <div class="form-control bg-light">{{ date('d-M-Y', strtotime($item->tgl_kegiatan)) }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold"><i class="fas fa-clock me-1"></i> Waktu</label>
                    <div class="form-control bg-light">{{ date('H:i', strtotime($item->waktu_kegiatan)) }}</div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-arrow-left me-1"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
