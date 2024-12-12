<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedVideo extends Model
{
    use HasFactory;

    protected $table = 'redes_videos';
    protected $primaryKey = 'idredes';

    protected $fillable = [
        'titulo',
        'url',
        'plataforma',
        'fecha',
        'tipo_idtipo',
        'usuario_id',
    ];

    // Relaciones
    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_idtipo', 'idtipo');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'idusuarios');
    }
}
