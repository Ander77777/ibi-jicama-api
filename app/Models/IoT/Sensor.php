<?php

namespace App\Models\IoT;

use App\Models\Historial\LecturaSensor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    protected $table = 'sensores';

    protected $fillable = [
        'nombre',
        'numero_serie',
        'modelo',
        'descripcion',
        'topic',
        'tipo_sensor_id',
        'estado_id',
        'cultivo_id'
    ];

   
    public function lecturas()
    {
        return $this->hasMany(LecturaSensor::class, 'sensor_id');
    }
}