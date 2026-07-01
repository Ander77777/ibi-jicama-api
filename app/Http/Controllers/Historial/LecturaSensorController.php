<?php

namespace App\Http\Controllers\Historial;

use App\Http\Controllers\Controller;
use App\Models\Historial\LecturaSensor;
use Illuminate\Http\Request;

class LecturaSensorController extends Controller
{
   public function index()
{
    $lecturas = LecturaSensor::with('sensor')->latest()->get();

    return response()->json([
        'status' => 'success',
        'data' => $lecturas
    ], 200);
}

    
}