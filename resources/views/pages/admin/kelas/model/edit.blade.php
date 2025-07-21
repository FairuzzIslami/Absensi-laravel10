<div class="modal fade" id="editModal-{{ $k->id_kelas }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $k->id_kelas }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="editModalLabel-{{ $k->id_kelas }}">
                    <i class="fas fa-pen-to-square me-2"></i> Edit Kelas
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('kelas.update', $k->id_kelas) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <!-- Nama Kelas -->
                    <div class="mb-3">
                        <label class="form-label fw-bold"><i class="fas fa-door-closed me-1"></i> Nama Kelas</label>
                        <select name="kelas" class="form-select" required>
                            <option value="">-- Pilih Kelas --</option>
                            <option value="10" {{ $k->kelas == '10' ? 'selected' : '' }}>10</option>
                            <option value="11" {{ $k->kelas == '11' ? 'selected' : '' }}>11</option>
                            <option value="12" {{ $k->kelas == '12' ? 'selected' : '' }}>12</option>
                        </select>
                    </div>

                    <!-- Jurusan -->
                    <div class="mb-3">
                        <label class="form-label fw-bold"><i class="fas fa-graduation-cap me-1"></i> Jurusan</label>
                        <select name="jurusan" class="form-select" required>
                            <option value="">-- Pilih Jurusan --</option>
                            <option value="animasi" {{ $k->jurusan == 'animasi' ? 'selected' : '' }}>Animasi</option>
                            <option value="rpl" {{ $k->jurusan == 'rpl' ? 'selected' : '' }}>RPL</option>
                            <option value="tsm" {{ $k->jurusan == 'tsm' ? 'selected' : '' }}>TSM</option>
                            <option value="tkr" {{ $k->jurusan == 'tkr' ? 'selected' : '' }}>TKR</option>
                            <option value="farmasi" {{ $k->jurusan == 'farmasi' ? 'selected' : '' }}>Farmasi</option>
                            <option value="tmi" {{ $k->jurusan == 'tmi' ? 'selected' : '' }}>TMI</option>
                            <option value="tataboga" {{ $k->jurusan == 'tataboga' ? 'selected' : '' }}>Tataboga</option>
                        </select>
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
