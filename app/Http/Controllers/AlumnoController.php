<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        return Alumno::all(); // Retorna todos los alumnos
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:32',
            'telefono' => 'nullable|string|max:16',
            'edad' => 'nullable|integer',
            'password' => 'required|string|max:64',
            'email' => 'required|string|email|max:64|unique:alumnos', // ⚠️ 'alumnos' corregido
            'sexo' => 'required|string',
        ]);

        // Se asegura de crear el registro con los campos validados
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
            'email' => 'sometimes|string|email|max:64|unique:alumnos,email,'.$id, // Evitar conflictos de "email único"
            'sexo' => 'sometimes|string',
        ]);

        $alumno = Alumno::findOrFail($id);
        $alumno->update($data); // Se asegura de usar los datos validados
        return response()->json($alumno, 200);
    }

    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();
        return response()->json(null, 204);
    }
}
