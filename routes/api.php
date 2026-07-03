<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Invernadero\InvernaderoController;
use App\Http\Controllers\Historial\LecturaSensorController;
use App\Http\Controllers\IoT\SensorController;
use App\Http\Controllers\Automatizacion\ElementoEstadoController;

Route::get('/invernaderos', [InvernaderoController::class, 'index']);
Route::get('/lectura-sensores', [LecturaSensorController::class, 'index']);
Route::apiResource('sensores-iot', SensorController::class);
Route::apiResource('elemento-estado', ElementoEstadoController::class);




/// Horarios
use App\Http\Controllers\Horario\HorarioController;

Route::get('horarios/turno/{turno}', [HorarioController::class, 'horariosPorTurno']);
Route::get('horarios/estadisticas', [HorarioController::class, 'estadisticas']);

Route::apiResource('horarios', HorarioController::class);





















// Producciones
use App\Http\Controllers\produccion\ProductionController;

Route::get('/production',[ProductionController::class,'index']);

//notificaciones
use App\Http\Controllers\notificaciones\AlertaController;

Route::get('/alertas', [AlertaController::class,'index']);


use App\Http\Controllers\MantenimientoController;

Route::get('/mantenimiento', [MantenimientoController::class, 'index']);

use App\Http\Controllers\Bitacora\ActividadController;

Route::get('/actividades', [ActividadController::class,'index']);


use App\Http\Controllers\NotificacionController;

Route::get('/notificaciones', [NotificacionController::class, 'index']);
Route::put('/notificaciones/{id}', [NotificacionController::class, 'update']);



use App\Http\Controllers\UserController;

Route::get('/employees', [UserController::class, 'employeesApi']);
Route::get('/employees/{id}', [UserController::class, 'employeeApi']);

use App\Http\Controllers\AttendanceController;

Route::get('/attendance/{employeeId}',[AttendanceController::class,'attendanceApi']);

Route::post('/attendance',[AttendanceController::class,'registerAttendanceApi']);



use App\Http\Controllers\ActivityController;

Route::get('/activities/{employeeId}',[ActivityController::class,'activitiesApi']);

Route::post('/activities',[ActivityController::class,'registerActivityApi']);


use App\Http\Controllers\ObservationController;

Route::get('/observations/{employeeId}',[ObservationController::class,'observationsApi']);

Route::post('/observations',[ObservationController::class,'registerObservationApi']);

Route::put('/observations/{id}',[ObservationController::class,'updateObservationApi']);

use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;

//================ CHAT ================

Route::get('/chats',[ChatController::class,'chatsApi']);

Route::post('/chats',[ChatController::class,'createChatApi']);

//=============== MENSAJES ==============

Route::get('/chats/{chatId}/messages',[MessageController::class,'messagesApi']);

Route::post('/chats/{chatId}/messages',[MessageController::class,'sendMessageApi']);
