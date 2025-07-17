@foreach ($users as $user)
<div class="modal fade" id="detailModal-{{ $user->id }}" tabindex="-1" aria-labelledby="detailModalLabel-{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="detailModalLabel-{{ $user->id }}">
                    <i class="fas fa-circle-info me-2"></i> Detail User
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label fw-bold"><i class="fas fa-user me-1"></i> Nama</label>
                    <div class="form-control bg-light">{{ $user->username }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold"><i class="fas fa-envelope me-1"></i> Email</label>
                    <div class="form-control bg-light">{{ $user->email }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold"><i class="fas fa-user-tag me-1"></i> Role</label>
                    <div class="form-control bg-light">{{ ucfirst($user->role->nama_role) }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold"><i class="fas fa-school me-1"></i> Kelas</label>
                    <div class="form-control bg-light">
                        @if($user->kelas)
                            {{ $user->kelas->kelas }} - {{ ucfirst($user->kelas->jurusan) }}
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
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
