<?php

namespace App\Models\Invernadero;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invernadero\Invernadero;

class Cama extends Model
{
    protected $table = 'camas';

    protected $fillable = [
        'invernadero_id',
        'nombre',
        'largo',
        'ancho'
    ];

    public function invernadero()
    {
        return $this->belongsTo(Invernadero::class, 'invernadero_id', 'id');
    }
}