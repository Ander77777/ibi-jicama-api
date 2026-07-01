<?php

namespace App\Http\Controllers\Invernadero;

use App\Http\Controllers\Controller;
use App\Models\Invernadero\Invernadero;
use Illuminate\Http\Request;

class InvernaderoController extends Controller
{
    public function index()
    {
        $invernaderos = Invernadero::all();

        return response()->json([
            'status' => 'success',
            'data' => $invernaderos
        ], 200);
    }
}