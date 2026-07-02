<?php

namespace App\Models\Horario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';

    protected $fillable = [
        'empleado_id',
        'turno',
        'actividad',
        'fecha_inicio',
        'fecha_fin',
        'hora_entrada',
        'hora_salida'
    ];
}
