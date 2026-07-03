<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invernadero\Invernadero;
use App\Models\Cama;
use App\Models\Cultivo;
use App\Models\User;

class Produccion extends Model
{
    protected $table = "producciones";

    protected $fillable = [
        'invernadero_id',
        'cama_id',
        'cultivo_id',
        'encargado_id',
        'produccionKg',
        'estado'
    ];

    public function invernadero()
{
    return $this->belongsTo(Invernadero::class);
}

public function cama()
{
    return $this->belongsTo(Cama::class);
}

public function cultivo()
{
    return $this->belongsTo(Cultivo::class);
}

public function encargado()
{
    return $this->belongsTo(User::class, 'encargado_id');
}
}