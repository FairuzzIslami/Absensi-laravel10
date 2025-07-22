<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kehadiran extends Model
{
    use HasFactory;
    protected $table = 'kehadiran';
    protected $primaryKey = 'id_kehadiran';
    protected $fillable = ['user_id', 'status', 'tanggal_kehadiran'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

