<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invernadero\Invernadero;

class Mantenimiento extends Model
{
    protected $table = 'mantenimientos';

    protected $fillable = [
        'titulo',
        'descripcion',
        'tipo',
        'estado',
        'invernadero_id'
    ];

    public function invernadero()
    {
        return $this->belongsTo(Invernadero::class);
    }
}