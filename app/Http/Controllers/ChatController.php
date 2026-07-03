<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    //====================================================
    // Obtener conversaciones
    //====================================================

    public function chatsApi()
    {
        try{

            $chats = Chat::with([
                'admin',
                'employee'
            ])->get();

            return response()->json([

                'success'=>true,

                'message'=>'Conversaciones obtenidas correctamente.',

                'data'=>$chats

            ],200);

        }catch(\Exception $e){

            return response()->json([

                'success'=>false,

                'message'=>'Error interno del servidor.'

            ],500);

        }

    }

    //====================================================
    // Crear conversación
    //====================================================

    public function createChatApi(Request $request)
    {
        try{

            $chat = Chat::create([

                'admin_id'=>$request->admin_id,

                'employee_id'=>$request->employee_id

            ]);

            return response()->json([

                'success'=>true,

                'message'=>'Conversación creada correctamente.',

                'data'=>$chat

            ],201);

        }catch(\Exception $e){

            return response()->json([

                'success'=>false,

                'message'=>'Error interno del servidor.'

            ],500);

        }

    }

}
