<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mantenimiento;


class MantenimientoController extends Controller
{
    
    public function index()
    {
        $mantenimientos = Mantenimiento::with('invernadero')->get();

        return response()->json(
            $mantenimientos->map(function ($m) {
                return [
                    "titulo" => $m->titulo,
                    "descripcion" => $m->descripcion,
                    "tipo" => $m->tipo,
                    "estado" => $m->estado,
                    "invernadero" => $m->invernadero->nombre
                ];
            })
        );
    }
}