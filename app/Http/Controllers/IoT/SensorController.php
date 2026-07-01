<?php

namespace App\Http\Controllers\IoT;

use App\Http\Controllers\Controller;
use App\Models\IoT\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function index() {
        return response()->json(Sensor::all(), 200);
    }

    public function store(Request $request) {
        $sensor = Sensor::create($request->all());
        return response()->json(['message' => 'Sensor creado con éxito', 'data' => $sensor], 201);
    }

    public function update(Request $request, $id) {
        $sensor = Sensor::findOrFail($id);
        $sensor->update($request->all());
        return response()->json(['message' => 'Sensor actualizado', 'data' => $sensor], 200);
    }

    public function destroy($id) {
        $sensor = Sensor::findOrFail($id);
        $sensor->delete();
        return response()->json(['message' => 'Sensor eliminado'], 200);
    }
}