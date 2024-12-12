<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $table = 'tipo';
    protected $primaryKey = 'idtipo';

    protected $fillable = [
        'nombre',
        'detalle',
    ];

// Tipo.php
public function noticias()
{
    return $this->belongsToMany(Noticia::class, 'noticias_has_tipo', 'tipo_id', 'noticia_id');
}


    public function redesVideos()
    {
        return $this->hasMany(RedVideo::class, 'tipo_idtipo', 'idtipo');
    }
    
}


