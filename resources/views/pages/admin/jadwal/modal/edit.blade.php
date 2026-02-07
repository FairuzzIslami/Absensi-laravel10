<div class="modal fade" id="editModal-{{ $j->id }}" tabindex="-1"
     aria-labelledby="editModalLabel-{{ $j->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content shadow">

            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="editModalLabel-{{ $j->id }}">
                    <i class="fas fa-pen-to-square me-2"></i> Edit Jadwal
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('jadwal.update', $j->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id_modal" value="{{ $j->id }}">

                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Guru</label>
                        <select name="guru_id" class="form-select" required>
                            @foreach ($guru as $g)
                                <option value="{{ $g->id }}"
                                    {{ $j->guru_id == $g->id ? 'selected' : '' }}>
                                    {{ $g->username }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Kelas</label>
                        <select name="kelas_id" class="form-select" required>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id_kelas }}"
                                    {{ $j->kelas_id == $k->id_kelas ? 'selected' : '' }}>
                                    {{ $k->kelas }} - {{ $k->jurusan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold">Hari</label>
                        <select name="hari" class="form-select" required>
                            @foreach (['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                                <option value="{{ $hari }}"
                                    {{ $j->hari == $hari ? 'selected' : '' }}>
                                    {{ $hari }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold">Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="form-control"
                               value="{{ $j->jam_mulai }}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold">Jam Selesai</label>
                        <input type="time" name="jam_selesai" class="form-control"
                               value="{{ $j->jam_selesai }}" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-arrow-left me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
