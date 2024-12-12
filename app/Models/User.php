<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users'; // Tabla asociada
    protected $primaryKey = 'idusuarios'; // Clave primaria

    protected $fillable = [
        'username',
        'email',
        'password',
        'rol',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relaciones
    public function noticias()
    {
        return $this->hasMany(Noticia::class, 'usuario_id', 'idusuarios');
    }

    public function redesVideos()
    {
        return $this->hasMany(RedVideo::class, 'usuario_id', 'idusuarios');
    }

    public function periodista()
    {
        return $this->hasOne(Periodista::class, 'usuario_id', 'idusuarios');
    }
}
