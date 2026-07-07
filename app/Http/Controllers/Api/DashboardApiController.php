<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Invernadero\Invernadero;
use App\Models\Invernadero\Cama;
use App\Models\Cultivo;

class DashboardApiController extends Controller
{
    public function propietarios()
    {
        return User::select(
            'id',
            'name as nombre'
        )->get();
    }


    public function invernaderos($userId)
    {
        return Invernadero::where(
            'user_id',
            $userId
        )->select(
            'id',
            'nombre'
        )->get();
    }


    // API DE CULTIVOS POR INVERNADERO
    public function cultivos($userId)
{
    return Cultivo::where(
        'user_id',
        $userId
    )
    ->select(
        'id',
        'nombre',
        'descripcion',
        'min_humedad',
        'max_humedad',
        'tipo_cultivo_id'
    )
    ->get();
}


    public function dashboard($invernaderoId)
    {
        $invernadero = Invernadero::with([
            'user',
            'camas'
        ])->findOrFail($invernaderoId);

        return response()->json([
            'temperatura' => 25,
            'humedad' => 60,
            'sensores' => 4,
            'camas' => $invernadero->camas->count(),
            'propietario' => [
                'nombre' => $invernadero->user->name,
            ],
            'invernadero' => [
                'nombre' => $invernadero->nombre,
            ],
            'grafica' => [82, 95, 78, 108, 88, 101, 93],
        ]);
    }


    public function camas($invernaderoId)
    {
        return Cama::where(
            'invernadero_id',
            $invernaderoId
        )
        ->select(
            'id',
            'nombre',
            'largo',
            'ancho'
        )
        ->get();
    }
}