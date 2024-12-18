<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransmisionEnVivo extends Model
{
    use HasFactory;

    // Especifica el nombre correcto de la tabla
    protected $table = 'transmision_en_vivo';

    protected $fillable = [
        'titulo',
        'url',
        'estado',
        'fecha_inicio',
        'fecha_fin',
    ];
}
