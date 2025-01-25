<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Colegio;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{

    public function showAlumno($id)
    {
        $alumno = Alumno::with(['colegio', 'profesor'])->findOrFail($id);

        return response()->json($alumno);
    }

    public function getColegio($id)
    {
        $alumno = Alumno::with('colegio')->findOrFail($id);
        return response()->json($alumno->colegio);
    }

    public function getProfesor($id)
    {
        $alumno = Alumno::with('profesor')->findOrFail($id);
        return response()->json($alumno->profesor);
    }




















    public function index()
    {
        return Alumno::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:32',
            'telefono' => 'nullable|string|max:16',
            'edad' => 'nullable|integer',
            'password' => 'required|string|max:64',
            'email' => 'required|string|email|max:64|unique:alumnos',
            'sexo' => 'required|string',
        ]);

        $alumno = Alumno::create($data);
        return response()->json($alumno, 201);
    }

    public function show(string $id)
    {
        return Alumno::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|string|max:32',
            'telefono' => 'nullable|string|max:16',
            'edad' => 'nullable|integer',
            'password' => 'sometimes|string|max:64',
            'email' => 'sometimes|string|email|max:64|unique:alumnos,email,' . $id,
            'sexo' => 'sometimes|string',
        ]);

        $alumno = Alumno::findOrFail($id);
        $alumno->update($data);
        return response()->json($alumno, 200);
    }

    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();
        return response()->json(null, 204);
    }
}
