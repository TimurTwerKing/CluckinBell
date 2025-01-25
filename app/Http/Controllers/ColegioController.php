<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colegio;

class ColegioController
{
    public function  showColegio($id)
    {
        $colegio = Colegio::with(['alumnos', 'profesors', 'director'])->findOrFail($id);
        return response()->json([$colegio]);
    }

     public function getAlumnos($id)
     {
         $colegio = Colegio::with('alumnos')->findOrFail($id);
         return response()->json($colegio->alumnos);
     }

     public function getProfesores($id)
     {
         $colegio = Colegio::with('profesors')->findOrFail($id);
         return response()->json($colegio->profesors);
     }

     public function getDirector($id)
     {
         $colegio = Colegio::with('director')->findOrFail($id);
         return response()->json($colegio->director);
     }
}
