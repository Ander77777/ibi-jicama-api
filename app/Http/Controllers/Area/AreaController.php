<?php

namespace App\Http\Controllers\Area;

use App\Http\Controllers\Controller;
use App\Models\Area\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        return response()->json(Area::all(), 200);
    }


    public function show($id)
    {
        return response()->json(Area::findOrFail($id), 200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'empleado_id'     => 'required|exists:users,id',
            'invernadero_id'  => 'required|exists:invernaderos,id',
            'cultivo_id'      => 'required|exists:cultivos,id',
            'actividad'       => 'required|string|max:255',
            'estado'          => 'required|in:Pendiente,En progreso,Completado',
            'progreso'        => 'required|numeric|min:0|max:1'
        ]);

        $area = Area::create($request->all());
        return response()->json([
            'message' => 'Área creada con éxito',
            'data' => $area
        ],201);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'empleado_id'     => 'required|exists:users,id',
            'invernadero_id'  => 'required|exists:invernaderos,id',
            'cultivo_id'      => 'required|exists:cultivos,id',
            'actividad'       => 'required|string|max:255',
            'estado'          => 'required|in:Pendiente,En progreso,Completado',
            'progreso'        => 'required|numeric|min:0|max:1'
        ]);

        $area = Area::findOrFail($id);
        $area->update($request->all());

        return response()->json([
            'message' => 'Área actualizada correctamente',
            'data' => $area
        ],200);
    }


    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();

        return response()->json([
            'message' => 'Área eliminada correctamente'
        ],200);
    }

    public function actualizarProgreso(Request $request, $id)
    {
        $request->validate([
            'progreso' => 'required|numeric|min:0|max:1'
        ]);

        $area = Area::findOrFail($id);
        $area->update([
            'progreso' => $request->progreso
        ]);

        return response()->json([
            'message' => 'Progreso actualizado correctamente',
            'data' => $area
        ], 200);
    }

    public function actualizarEstado(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:Pendiente,En progreso,Completado'
        ]);

        $area = Area::findOrFail($id);
        $area->update([
            'estado' => $request->estado
        ]);

        return response()->json([
            'message' => 'Estado actualizado correctamente',
            'data' => $area
        ], 200);
    }


    public function historial()
    {
        $historial = Area::orderBy('created_at', 'desc')->get();
        return response()->json($historial, 200);
    }



    public function resumenDia()
    {
        $pendientes = Area::where('estado', 'Pendiente')->count();
        $completadas = Area::where('estado', 'Completado')->count();
        $requierenSupervision = Area::where('progreso', '<', 0.50)->count();
        $productividad = round(Area::avg('progreso') * 100, 2);

        return response()->json([
            'actividades_pendientes' => $pendientes,
            'actividades_completadas' => $completadas,
            'areas_requieren_supervision' => $requierenSupervision,
            'productividad_general' => $productividad . '%'
        ],200);
    }



    public function productividadSemanal()
    {
        $productividad = Area::selectRaw('
                cultivo_id,
                AVG(progreso) as productividad
            ')
            ->groupBy('cultivo_id')
            ->get();

        return response()->json($productividad,200);
    }
}


