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




//Asignacion de areas
use App\Http\Controllers\Area\AreaController;

Route::get('areas/historial',[AreaController::class,'historial']);
Route::get('areas/resumen-dia',[AreaController::class,'resumenDia']);
Route::get('areas/productividad-semanal',[AreaController::class,'productividadSemanal']);

Route::patch('areas/{id}/progreso',[AreaController::class,'actualizarProgreso']);
Route::patch('areas/{id}/estado',[AreaController::class,'actualizarEstado']);

Route::apiResource('areas',AreaController::class);
