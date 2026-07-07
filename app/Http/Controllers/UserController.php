<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Seguridad\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

public function employeesApi()
{
    try {

        $users = User::with(['datosGenerales', 'rol'])->get();

        $employees = $users->map(function ($user) {

            return [

                'id' => $user->id,
                'nombre' => $user->name,
                'correo' => $user->email,

                'fotografia' => $user->datosGenerales?->image
                    ? asset('storage/' . $user->datosGenerales->image)
                    : null,

                'cargo' => $user->rol?->name ?? '',

                // Si aún no existen estos campos puedes dejarlos vacíos
                'turno' => 'Matutino',
                'invernadero' => 'Invernadero UTP',
                'estado_laboral' => 'Activo',

            ];

        });

        return response()->json([
            'success' => true,
            'message' => 'Lista de empleados obtenida correctamente.',
            'data' => $employees
        ], 200);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => 'Error interno del servidor.'
        ], 500);

    }
}

public function employeeApi($id)
{
    try {

        $user = User::with(['datosGenerales', 'rol'])->find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Empleado no encontrado.'
            ], 404);
        }

        return response()->json([

            'success' => true,
            'message' => 'Información del empleado.',

            'data' => [

                'id' => $user->id,
                'nombre' => $user->name,
                'correo' => $user->email,
                'rol_id'=> $user->rol_id,
                

                'fotografia' => $user->datosGenerales?->image
                    ? asset('storage/' . $user->datosGenerales->image)
                    : null,

                'cargo' => $user->rol?->name ?? '',

                'turno' => 'Matutino',
                'invernadero' => 'Invernadero UTP',
                'estado_laboral' => 'Activo',


            ]

        ], 200);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => 'Error interno del servidor.'
        ], 500);

    }
}

}
