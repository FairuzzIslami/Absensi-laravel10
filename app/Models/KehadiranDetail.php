<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KehadiranDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'kehadiran_id',
        'nama',
        'nis',
        'tanda_tangan'
    ];
}
