<div class="modal fade" id="editModal-{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="editModalLabel-{{ $user->id }}">
                    <i class="fas fa-pen-to-square me-2"></i> Edit User
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <!-- Nama -->
                    <div class="mb-3">
                        <label class="form-label fw-bold"><i class="fas fa-user me-1"></i> Nama</label>
                        <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label fw-bold"><i class="fas fa-envelope me-1"></i> Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                    </div>

                    <!-- Role -->
                    <div class="mb-3">
                        <label class="form-label fw-bold"><i class="fas fa-user-tag me-1"></i> Role</label>
                        <select name="id_role" class="form-select" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->role_id }}" {{ $user->id_role == $role->role_id ? 'selected' : '' }}>
                                    {{ ucfirst($role->nama_role) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Kelas -->
                    <div class="mb-3">
                        <label class="form-label fw-bold"><i class="fas fa-school me-1"></i> Kelas (Opsional)</label>
                        <select name="id_kelas" class="form-select">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id_kelas }}" {{ $user->id_kelas == $k->id_kelas ? 'selected' : '' }}>
                                    {{ $k->kelas }} - {{ ucfirst($k->jurusan) }}
                                </option>
                            @endforeach
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
