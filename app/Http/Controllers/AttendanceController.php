<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    //===================================================
    // Obtener asistencia de un empleado
    //===================================================

    public function attendanceApi($employeeId)
    {
        try{

            $employee = User::find($employeeId);

            if(!$employee){

                return response()->json([
                    'success'=>false,
                    'message'=>'Empleado no encontrado.'
                ],404);

            }

            $attendance = Attendance::where('user_id',$employeeId)
                            ->orderBy('date_time','desc')
                            ->get();

            return response()->json([

                'success'=>true,
                'message'=>'Historial obtenido correctamente.',

                'data'=>$attendance

            ],200);

        }catch(\Exception $e){

            return response()->json([
                'success'=>false,
                'message'=>'Error interno del servidor.'
            ],500);

        }

    }

    //===================================================
    // Registrar asistencia
    //===================================================

    public function registerAttendanceApi(Request $request)
    {
        try{

            $attendance = Attendance::create([

                'user_id'=>$request->user_id,

                'type'=>$request->type,

                'date_time'=>now()

            ]);

            return response()->json([

                'success'=>true,

                'message'=>'Asistencia registrada correctamente.',

                'data'=>$attendance

            ],201);

        }catch(\Exception $e){

            return response()->json([

                'success'=>false,

                'message'=>'Error interno del servidor.'

            ],500);

        }

    }

}
