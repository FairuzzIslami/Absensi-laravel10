<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
      protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = ['kelas', 'jurusan'];

    public function users()
    {
        return $this->hasMany(User::class, 'id_kelas');
    }
}
