<?php

namespace App\Models\Seguridad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles'; // Nombre de la tabla

    protected $fillable = [
        'rol', // Campo que definiste en tu tabla
    ];

    // Si quieres que Laravel maneje automáticamente created_at y updated_at, no necesitas cambiar nada
    public $timestamps = true;

    // Relación con usuarios (opcional)
    public function users()
    {
        return $this->hasMany(User::class, 'rol_id');
    }
}