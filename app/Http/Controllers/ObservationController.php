<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use App\Models\User;
use Illuminate\Http\Request;

class ObservationController extends Controller
{

    //=================================================
    // Obtener observaciones
    //=================================================

    public function observationsApi($employeeId)
    {
        try{

            $employee = User::find($employeeId);

            if(!$employee){

                return response()->json([
                    'success'=>false,
                    'message'=>'Empleado no encontrado.'
                ],404);

            }

            $observations = Observation::where('user_id',$employeeId)
                                ->latest()
                                ->get();

            return response()->json([

                'success'=>true,

                'message'=>'Observaciones obtenidas correctamente.',

                'data'=>$observations

            ],200);

        }catch(\Exception $e){

            return response()->json([
                'success'=>false,
                'message'=>'Error interno del servidor.'
            ],500);

        }

    }

    //=================================================
    // Registrar observación
    //=================================================

    public function registerObservationApi(Request $request)
    {
        try{

            $observation = Observation::create([

                'user_id'=>$request->user_id,

                'observation'=>$request->observation

            ]);

            return response()->json([

                'success'=>true,

                'message'=>'Observación registrada correctamente.',

                'data'=>$observation

            ],201);

        }catch(\Exception $e){

            return response()->json([
                'success'=>false,
                'message'=>'Error interno del servidor.'
            ],500);

        }

    }

    //=================================================
    // Editar observación
    //=================================================

    public function updateObservationApi(Request $request,$id)
    {
        try{

            $observation = Observation::find($id);

            if(!$observation){

                return response()->json([
                    'success'=>false,
                    'message'=>'Observación no encontrada.'
                ],404);

            }

            $observation->update([

                'observation'=>$request->observation

            ]);

            return response()->json([

                'success'=>true,

                'message'=>'Observación actualizada correctamente.',

                'data'=>$observation

            ],200);

        }catch(\Exception $e){

            return response()->json([
                'success'=>false,
                'message'=>'Error interno del servidor.'
            ],500);

        }

    }

}
