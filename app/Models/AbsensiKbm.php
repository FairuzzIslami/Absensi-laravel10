<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiKbm extends Model
{
    use HasFactory;

    protected $table = 'absensi_kbm';

    protected $fillable = [
        'jadwal_mengajar_id',
        'siswa_id',
        'tanggal',
        'status',
        'jam_absen',
    ];

    // relasi ke jadwal mengajar
    public function jadwal()
    {
        return $this->belongsTo(JadwalMengajar::class, 'jadwal_mengajar_id');
    }

    // relasi ke siswa (users)
    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }
}
