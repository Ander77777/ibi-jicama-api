<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notificacion;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    // GET /api/notificaciones
    public function index()
    {
        return response()->json(
            Notificacion::with('invernadero')->get()->map(function ($n) {
                return [
                    "id" => $n->id,
                    "titulo" => $n->titulo,
                    "descripcion" => $n->descripcion,
                    "estado" => $n->estado,
                    "invernadero" => $n->invernadero->nombre
                ];
            })
        );
    }

    // PUT /api/notificaciones/{id}
    public function update($id)
    {
        $notificacion = Notificacion::find($id);

        if (!$notificacion) {
            return response()->json([
                "message" => "Notificación no encontrada"
            ], 404);
        }

        $notificacion->estado = "Leída";
        $notificacion->save();

        return response()->json([
            "message" => "Notificación marcada como leída"
        ]);
    }
}