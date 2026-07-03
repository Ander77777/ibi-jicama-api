<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{
    protected $table = 'cultivos';

    protected $fillable = [
        'user_id',
        'nombre',
        'descripcion',
        'min_humedad',
        'max_humedad',
        'tipo_cultivo_id'
    ];

    // Relación con usuario (quien lo creó o responsable)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con tipo de cultivo (si existe tabla tipo_cultivos)
    public function tipoCultivo()
    {
        return $this->belongsTo(TipoCultivo::class);
    }
}