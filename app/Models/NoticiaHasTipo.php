<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class NoticiaHasTipo extends Pivot
{
    protected $table = 'noticias_has_tipo';

    protected $fillable = [
        'noticia_id',
        'tipo_id',
    ];

    public $incrementing = false; // Clave primaria compuesta
}
