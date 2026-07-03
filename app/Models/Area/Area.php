<?php

namespace App\Models\Area;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
     protected $table = 'areas';

    protected $fillable = [
        'empleado_id',
        'invernadero_id',
        'cultivo_id',
        'actividad',
        'estado',
        'progreso'
    ];
}
