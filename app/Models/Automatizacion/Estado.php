<?php

namespace App\Models\Automatizacion;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados'; // Apuntamos a tu tabla exacta
    protected $fillable = ['estado'];
}