<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    //=============================================
    // Obtener actividades de un empleado
    //=============================================

    public function activitiesApi($employeeId)
    {
        try{

            $employee = User::find($employeeId);

            if(!$employee){

                return response()->json([
                    'success'=>false,
                    'message'=>'Empleado no encontrado.'
                ],404);

            }

            $activities = Activity::where('user_id',$employeeId)
                            ->orderBy('date','desc')
                            ->get();

            return response()->json([

                'success'=>true,

                'message'=>'Actividades obtenidas correctamente.',

                'data'=>$activities

            ],200);

        }catch(\Exception $e){

            return response()->json([

                'success'=>false,

                'message'=>'Error interno del servidor.'

            ],500);

        }

    }

    //=============================================
    // Registrar actividad
    //=============================================

    public function registerActivityApi(Request $request)
    {
        try{

            $activity = Activity::create([

                'user_id'=>$request->user_id,

                'activity'=>$request->activity,

                'description'=>$request->description,

                'date'=>now()->toDateString()

            ]);

            return response()->json([

                'success'=>true,

                'message'=>'Actividad registrada correctamente.',

                'data'=>$activity

            ],201);

        }catch(\Exception $e){

            return response()->json([

                'success'=>false,

                'message'=>'Error interno del servidor.'

            ],500);

        }

    }

}
