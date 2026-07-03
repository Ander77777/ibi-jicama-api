<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;

    protected $fillable=[
        'admin_id',
        'employee_id'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class,'admin_id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class,'employee_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
