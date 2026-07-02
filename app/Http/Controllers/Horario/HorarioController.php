<?php

namespace App\Http\Controllers\Horario;

use App\Http\Controllers\Controller;
use App\Models\Horario\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{

    public function index()
    {
        return response()->json(Horario::all(), 200);
    }


    public function show($id)
    {
        return response()->json(Horario::findOrFail($id), 200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'empleado_id' => 'required|exists:users,id',
            'turno' => 'required|in:Matutino,Vespertino,Nocturno',
            'actividad' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'hora_entrada' => 'required',
            'hora_salida' => 'required'
        ]);

        $horario = Horario::create($request->all());

        return response()->json([
            'message' => 'Horario creado con éxito',
            'data' => $horario
        ], 201);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'empleado_id' => 'required|exists:users,id',
            'turno' => 'required|in:Matutino,Vespertino,Nocturno',
            'actividad' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'hora_entrada' => 'required',
            'hora_salida' => 'required'
        ]);

        $horario = Horario::findOrFail($id);
        $horario->update($request->all());

        return response()->json([
            'message' => 'Horario actualizado',
            'data' => $horario
        ], 200);
    }


    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();

        return response()->json([
            'message' => 'Horario eliminado'
        ], 200);
    }


    public function horariosPorTurno($turno)
    {
        $horarios = Horario::where('turno', $turno)->get();

        return response()->json($horarios, 200);
    }


    public function estadisticas()
    {
        return response()->json([
            'total_horarios_activos' => Horario::count(),
            'total_empleados' => Horario::distinct('empleado_id')->count('empleado_id'),
            'total_turnos_registrados' => Horario::distinct('turno')->count('turno')
        ], 200);
    }
}
