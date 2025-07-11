<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kegiatan',
        'tgl_kegiatan',
        'waktu_kegiatan',
        'foto_kegiatan'
    ];
}
