<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['idcheck'])->group(function () {
    Route::get('/alumnos', [AlumnoController::class, 'index']);
    Route::get('/alumnos/{id}', [AlumnoController::class, 'show']);
    Route::post('/alumnos', [AlumnoController::class, 'store']);
    Route::put('/alumnos/{id}', [AlumnoController::class, 'update']);
    Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy']);
});