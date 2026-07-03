<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatosGenerales extends Model
{
    protected $table = 'datos_generales';

    protected $fillable = [
        'user_id', 'name', 'image', 'telephone', 'street', 'number',
        'intersection', 'suburb', 'town', 'postal_code', 'facebook',
        'github', 'linkedin', 'profession', 'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
