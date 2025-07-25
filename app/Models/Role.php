<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
     protected $table = 'roles';
    protected $primaryKey = 'role_id';
    protected $fillable = ['nama_role'];

    public function users()
    {
        return $this->hasMany(User::class, 'id_role');
    }
}
