<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use app\Models\Profesor;

class ProfesorController
{
    public function showProfesor($id)
    {
        $profesor = Profesor::with(['alumnos', 'colegio'])->findOrFail($id);

        return response()->json($profesor);
    }

    public function getAlumnos($id)
    {
        $profesor = Profesor::with('alumnos')->findOrFail($id);
        return response()->json($profesor->alumnos);
    }

    public function getColegio($id)
    {
        $profesor = Profesor::with('colegio')->findOrFail($id);
        return response()->json($profesor->colegio);
    }
}
