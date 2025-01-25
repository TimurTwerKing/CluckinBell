<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ColegioController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\DirectorController;
use App\Http\Middleware\IdCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::apiResource("alumnos", AlumnoController::class)->middleware(IdCheckMiddleware::class);

Route::get('/alumnos', [AlumnoController::class, 'index']);
Route::post('/alumnos', [AlumnoController::class, 'store']);

Route::middleware(IdCheckMiddleware::class)->group(function () {
    Route::get('/alumnos/{id}', [AlumnoController::class, 'show']);
    Route::put('/alumnos/{id}', [AlumnoController::class, 'update']);
    Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy']);
});

// Rutas para Alumno
Route::get('alumnos/{id}/colegio', [AlumnoController::class, 'getColegio']);
Route::get('alumnos/{id}/profesor', [AlumnoController::class, 'getProfesor']);

// Rutas para Profesor
Route::get('profesores/{id}/alumnos', [ProfesorController::class, 'getAlumnos']);
Route::get('profesores/{id}/colegio', [ProfesorController::class, 'getColegio']);

// Rutas para Colegio
Route::get('colegios/{id}/alumnos', [ColegioController::class, 'getAlumnos']);
Route::get('colegios/{id}/profesores', [ColegioController::class, 'getProfesores']);
Route::get('colegios/{id}/director', [ColegioController::class, 'getDirector']);

// Rutas para Director
Route::get('directores/{id}/colegio', [DirectorController::class, 'getColegio']);
