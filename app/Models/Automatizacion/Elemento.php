<?php

namespace App\Models\Automatizacion;

use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    protected $table = 'elementos';

    protected $fillable = [
        'invernadero_id',
        'numero',
        'elemento', 
        'topic',
        'estado_id',
        'modulo_id',
        'ubicacion'
    ];

    public function estadoInfo()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }
}