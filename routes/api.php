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