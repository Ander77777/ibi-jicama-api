<?php

namespace App\Http\Controllers\Automatizacion;

use App\Http\Controllers\Controller;
use App\Models\Automatizacion\Elemento;
use Illuminate\Http\Request;

class ElementoEstadoController extends Controller
{
    // 1. GET: Listar todos los elementos con sus estados
    public function index() {
        $elementos = Elemento::with('estadoInfo')->get();
        
        return response()->json($elementos, 200);
    }

    // 2. POST: Agregar un nuevo elemento y su estado
    public function store(Request $request) {
        $elemento = Elemento::create($request->all());
        return response()->json(['message' => 'Elemento creado con éxito', 'data' => $elemento], 201);
    }

    // 3. PUT: Editar un elemento existente (por ID)
    public function update(Request $request, $id) {
        $elemento = Elemento::findOrFail($id);
        $elemento->update($request->all());
        return response()->json(['message' => 'Elemento actualizado', 'data' => $elemento], 200);
    }

    // 4. DELETE: Eliminar un elemento
    public function destroy($id) {
        $elemento = Elemento::findOrFail($id);
        $elemento->delete();
        return response()->json(['message' => 'Elemento eliminado correctamente'], 200);
    }
}