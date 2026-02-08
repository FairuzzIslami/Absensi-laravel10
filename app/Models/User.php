<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\JadwalMengajar;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'foto',
        'password',
        'id_role',
        'id_kelas'
    ];

    protected $hidden = ['password'];
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class, 'user_id');
    }

    public function absensiKbm()
    {
        return $this->hasMany(AbsensiKbm::class, 'siswa_id');
    }
    
    public function jadwalMengajar()
    {
        return $this->hasMany(JadwalMengajar::class, 'guru_id');
    }
}
