<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransmisionEnVivo extends Model
{
    use HasFactory;

    // Especifica el nombre correcto de la tabla (si no sigue el formato plural de Laravel)
    protected $table = 'transmision_en_vivo';

    // Definir los atributos que pueden ser asignados masivamente
    protected $fillable = [
        'titulo',
        'url',
        'estado',
        'fecha_inicio',
        'fecha_fin',
    ];

    // Si tienes timestamps en tu tabla, Laravel los manejará automáticamente
    // Si no deseas que Laravel maneje los timestamps, puedes deshabilitarlo:
    // public $timestamps = false;
}
