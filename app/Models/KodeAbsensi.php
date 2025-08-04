<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeAbsensi extends Model
{
    use HasFactory;

    protected $table = 'kode_absensi';

    protected $fillable = ['kode', 'tanggal', 'untuk_role'];

    public function pengguna()
    {
        return $this->hasMany(PenggunaanKode::class, 'kode_absensi_id');
    }
}
