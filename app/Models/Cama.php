<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cama extends Model
{
    protected $table = 'camas';

    protected $fillable = [
        'invernadero_id',
        'nombre',
        'largo',
        'ancho'
    ];

    // Relación: una cama pertenece a un invernadero
    public function invernadero()
    {
        return $this->belongsTo(Invernadero::class);
    }
}