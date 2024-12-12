<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $table = 'noticias';
    protected $primaryKey = 'idnoticias';
    protected $dates = ['fecha'];
    protected $fillable = [
        'titular',
        'contenido',
        'image',
        'fecha',
        'fuente',
        'usuario_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'idusuarios');
    }

    public function tipos()
    {
        return $this->belongsToMany(Tipo::class, 'noticias_has_tipo', 'noticia_id', 'tipo_id');
    }
}


