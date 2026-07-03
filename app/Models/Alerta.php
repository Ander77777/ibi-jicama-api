<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use App\Models\Invernadero\Invernadero;

class Alerta extends Model
{
 
    protected $fillable=[
        'titulo',
        'descripcion',
        'severidad',
        'estado',
        'invernadero_id'
    ];

    public function invernadero()
    {
        return $this->belongsTo(Invernadero::class);
    }
}

