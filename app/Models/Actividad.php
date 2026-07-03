<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Actividad extends Model
{
    protected $table = 'actividades';

    protected $fillable = [
        'titulo',
        'descripcion',
        'estado',
        'zona',
        'user_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function actividades()
{
    return $this->hasMany(Actividad::class);
}
}