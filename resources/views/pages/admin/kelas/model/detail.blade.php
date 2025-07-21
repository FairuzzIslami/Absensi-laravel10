@foreach ($kelas as $k)
<div class="modal fade" id="detailModal-{{ $k->id_kelas }}" tabindex="-1" aria-labelledby="detailModalLabel-{{ $k->id_kelas }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="detailModalLabel-{{ $k->id_kelas }}">
                    <i class="fas fa-circle-info me-2"></i> Detail Kelas
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!-- Nama Kelas -->
                <div class="mb-3">
                    <label class="form-label fw-bold"><i class="fas fa-door-closed me-1"></i> Nama Kelas</label>
                    <div class="form-control bg-light">{{ $k->kelas }}</div>
                </div>

                <!-- Jurusan -->
                <div class="mb-3">
                    <label class="form-label fw-bold"><i class="fas fa-graduation-cap me-1"></i> Jurusan</label>
                    <div class="form-control bg-light">{{ ucfirst($k->jurusan) }}</div>
                </div>

                <!-- Jumlah Siswa -->
                <div class="mb-3">
                    <label class="form-label fw-bold"><i class="fas fa-users me-1"></i> Jumlah Siswa</label>
                    <div class="form-control bg-light">
                        {{ $k->users->count() }} siswa
                    </div>
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
@endforeach
