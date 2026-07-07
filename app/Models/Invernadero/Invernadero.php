<?php

namespace App\Models\Invernadero;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invernadero\Cama;
use App\Models\User;

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

    public function alertas()
{
    return $this->hasMany(Alerta::class);
}


public function camas()
{
    return $this->hasMany(Cama::class);
}

public function user()
    {
        return $this->belongsTo(User::class);
    }
}