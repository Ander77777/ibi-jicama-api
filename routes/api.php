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




