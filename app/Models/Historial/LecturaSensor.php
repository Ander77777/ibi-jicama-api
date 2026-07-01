<?php

namespace App\Models\Historial;

use App\Models\IoT\Sensor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturaSensor extends Model
{
    use HasFactory;

    protected $table = 'lecturas_sensores'; 

    protected $fillable = [
        'invernadero_id',
        'temperatura',
        'humedad',
        'humedad_suelo',
        'fecha_lectura'
    ];

    public function sensor()
{
    return $this->belongsTo(Sensor::class, 'sensor_id');
}
}