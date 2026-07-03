<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    //====================================================
    // Obtener mensajes
    //====================================================

    public function messagesApi($chatId)
    {

        try{

            $messages = Message::where('chat_id',$chatId)
                            ->with('sender')
                            ->orderBy('created_at','asc')
                            ->get();

            return response()->json([

                'success'=>true,

                'message'=>'Mensajes obtenidos correctamente.',

                'data'=>$messages

            ],200);

        }catch(\Exception $e){

            return response()->json([

                'success'=>false,

                'message'=>'Error interno del servidor.'

            ],500);

        }

    }

    //====================================================
    // Enviar mensaje
    //====================================================

    public function sendMessageApi(Request $request,$chatId)
    {

        try{

            $message = Message::create([

                'chat_id'=>$chatId,

                'sender_id'=>$request->sender_id,

                'message'=>$request->message

            ]);

            return response()->json([

                'success'=>true,

                'message'=>'Mensaje enviado correctamente.',

                'data'=>$message

            ],201);

        }catch(\Exception $e){

            return response()->json([

                'success'=>false,

                'message'=>'Error interno del servidor.'

            ],500);

        }

    }

}
