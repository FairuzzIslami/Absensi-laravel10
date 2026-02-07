<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalMengajar extends Model
{
    use HasFactory;
    protected $table = 'jadwal_mengajar';

    protected $fillable = [
        'guru_id',
        'kelas_id',
        'hari',
        'jam_mulai',
        'jam_selesai'
    ];

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id_kelas');
    }
}
