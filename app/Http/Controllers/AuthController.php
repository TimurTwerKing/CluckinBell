<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return $this->sendResponse(false, 'Errores de validación', $validator->errors(), 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $this->sendResponse(true, 'Usuario registrado correctamente', $user, 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->sendResponse(false, 'Errores de validación', $validator->errors(), 400);
        }

        $credentials = ['password' => $request->password];
        $login = $request->input('login');

        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $login;
        } else {
            $credentials['name'] = $login;
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('Token de acceso')->accessToken;
            return $this->sendResponse(true, 'Inicio de sesión exitoso', ['token' => $token, 'user' => $user]);
        }

        return $this->sendResponse(false, 'Credenciales inválidas', null, 401);
    }

    public function logout(Request $request)
    {
        Auth::user()->tokens()->delete();
        return $this->sendResponse(true, 'Sesión cerrada correctamente', null);
    }

    public function me(Request $request)
    {
        return $this->sendResponse(true, 'Usuario autenticado', $request->user());
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return $this->sendResponse(false, 'Usuario no encontrado', null, 404);
        }

        return $this->sendResponse(true, 'Usuario encontrado', $user);
    }


    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'identifier' => 'required',
    //         'password' => 'required'
    //     ]);


    //     $users = User::where('email', $request->identifier)
    //         ->orWhere('name', $request->identifier)
    //         ->get();


    //     foreach ($users as $user) {

    //         if (Hash::check($request->password, $user->password)) {

    //             if ($user->tokens()->count()) {
    //                 return response()->json(['message' => 'Ya tienes una sesión iniciada.'], 200);
    //             }

    //             $token = $user->createToken('auth_token')->plainTextToken;

    //             return response()->json(['message' => 'Inicio de sesión exitoso.', 'token' => $token, 'user' => $user], 200);
    //         }
    //     }

    //     throw ValidationException::withMessages([
    //         'identifier' => ['Credenciales incorrectas.']
    //     ]);
    // }

    // public function logout(Request $request)
    // {
    //     Auth::user()->tokens()->delete();
    //     return response()->json(['message' => 'Sesión cerrada correctamente.']);
    // }

    // public function me(Request $request)
    // {
    //     return response()->json($request->user());
    // }

    // public function show($id)
    // {
    //     $user = User::find($id);

    //     if (!$user) {
    //         return response()->json(['message' => 'Usuario no encontrado'], 404);
    //     }

    //     return response()->json($user);
    // }

}
