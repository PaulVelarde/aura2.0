<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodista extends Model
{
    use HasFactory;

    protected $table = 'periodistas';
    protected $primaryKey = 'idperiodistas';

    protected $fillable = [
        'nombre',
        'especialidad',
        'usuario_id',
    ];

    // Relaciones
    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'idusuarios');
    }
}
