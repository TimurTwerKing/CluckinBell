<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'identifier' => 'required',
            'password' => 'required'
        ]);


        $users = User::where('email', $request->identifier)
            ->orWhere('name', $request->identifier)
            ->get();


        foreach ($users as $user) {

            if (Hash::check($request->password, $user->password)) {

                if ($user->tokens()->count()) {
                    return response()->json(['message' => 'Ya tienes una sesión iniciada.'], 200);
                }

                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json(['message' => 'Inicio de sesión exitoso.', 'token' => $token, 'user' => $user], 200);
            }
        }

        throw ValidationException::withMessages([
            'identifier' => ['Credenciales incorrectas.']
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Sesión cerrada correctamente.']);
    }

    public function me(Request $request)
    {
        return response()->json($request->user());
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($user);
    }
}
