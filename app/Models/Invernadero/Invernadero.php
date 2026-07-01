<?php

namespace App\Models\Invernadero;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invernadero extends Model
{
    use HasFactory;

    
    protected $table = 'invernaderos';

    protected $fillable = [
        'user_id',
        'nombre',
        'longitud',
        'latitud',
        'ancho',
        'alto',
        'largo',
        'descripcion'
    ];
}