<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('alumnos', AlumnoController::class)->middleware('idcheck');


// Route::middleware(['idcheck'])->group(function () {
//     Route::get('/alumnos', [AlumnoController::class, 'index']);
//     Route::get('/alumnos/{id}', [AlumnoController::class, 'show']);
//     Route::post('/alumnos', [AlumnoController::class, 'store']);
//     Route::put('/alumnos/{id}', [AlumnoController::class, 'update']);
//     Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy']);
// });

