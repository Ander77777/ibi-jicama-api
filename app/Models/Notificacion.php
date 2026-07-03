<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invernadero\Invernadero;

class Notificacion extends Model
{
    protected $table = 'notificaciones';

    protected $fillable = [
        'titulo',
        'descripcion',
        'estado',
        'invernadero_id'
    ];

    public function invernadero()
    {
        return $this->belongsTo(Invernadero::class);
    }
}