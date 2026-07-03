<?php

namespace App\Http\Controllers\Bitacora;

use App\Http\Controllers\Controller;
use App\Models\Actividad;

class ActividadController extends Controller
{
    public function index()
    {
        $actividades = Actividad::with('usuario')->get();

        return response()->json(

            $actividades->map(function($actividad){

                return [

                    "titulo" => $actividad->titulo,

                    "estado" => $actividad->estado,

                    "zona" => $actividad->zona,

                    "trabajador" => $actividad->usuario->name,

                    "descripcion" => $actividad->descripcion

                ];

            })

        );
    }
}