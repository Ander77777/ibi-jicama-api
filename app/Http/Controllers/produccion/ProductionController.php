<?php

namespace App\Http\Controllers\produccion;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produccion;

class ProductionController extends Controller
{
    public function index()
{
    $data = Produccion::with([
        'invernadero',
        'cama',
        'cultivo',
        'encargado'
    ])->get();

    return response()->json($data);
}
}