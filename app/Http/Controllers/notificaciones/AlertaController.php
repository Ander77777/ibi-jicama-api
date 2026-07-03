<?php

namespace App\Http\Controllers\notificaciones;

use App\Http\Controllers\Controller;
use App\Models\Alerta;

class AlertaController extends Controller
{
    public function index()
    {
        $alertas = Alerta::with('invernadero')->get();

        return response()->json(

            $alertas->map(function($alerta){

                return [

                    "titulo"=>$alerta->titulo,

                    "severidad"=>$alerta->severidad,

                    "estado"=>$alerta->estado,

                    "invernadero"=>$alerta->invernadero->nombre

                ];

            })

        );

    }
}