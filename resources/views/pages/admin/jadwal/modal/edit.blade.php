<div class="modal fade" id="editModal-{{ $j->id }}" tabindex="-1"
     aria-labelledby="editModalLabel-{{ $j->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">

            {{-- Header --}}
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="editModalLabel-{{ $j->id }}">
                    <i class="fa-solid fa-pen-to-square me-2"></i>
                    Edit Jadwal Mengajar
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            {{-- Form --}}
            <form action="{{ route('jadwal.update', $j->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="row g-3">

                        {{-- Guru --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Guru</label>
                            <select name="guru_id" class="form-select" required>
                                @foreach ($guru as $g)
                                    <option value="{{ $g->id }}"
                                        {{ $j->guru_id == $g->id ? 'selected' : '' }}>
                                        {{ $g->username }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Mapel --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Mata Pelajaran</label>
                            <select name="mapel_id" class="form-select" required>
                                <option value="">-- Belum Ada --</option>
                                @foreach ($mapel as $m)
                                    <option value="{{ $m->id }}"
                                        {{ $j->mapel_id == $m->id ? 'selected' : '' }}>
                                        {{ $m->nama_mapel }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Kelas --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Kelas</label>
                            <select name="kelas_id" class="form-select" required>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id_kelas }}"
                                        {{ $j->kelas_id == $k->id_kelas ? 'selected' : '' }}>
                                        {{ $k->kelas }} - {{ strtoupper($k->jurusan) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Hari --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Hari</label>
                            <select name="hari" class="form-select" required>
                                @foreach (['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                                    <option value="{{ $hari }}"
                                        {{ $j->hari == $hari ? 'selected' : '' }}>
                                        {{ $hari }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Jam Mulai --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Jam Mulai</label>
                            <input type="time"
                                   name="jam_mulai"
                                   class="form-control"
                                   value="{{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }}"
                                   required>
                        </div>

                        {{-- Jam Selesai --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Jam Selesai</label>
                            <input type="time"
                                   name="jam_selesai"
                                   class="form-control"
                                   value="{{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}"
                                   required>
                        </div>

                    </div>
                </div>

                {{-- Footer --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
