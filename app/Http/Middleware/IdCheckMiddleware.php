<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdCheckMiddleware
{
    /**
     * Manejar una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Obtener el parámetro 'id' de la ruta
        $id = $request->route('id');

        // Verificar si 'id' es un número positivo
        if (!is_numeric($id) || $id <= 0) {
            // Retornar una respuesta JSON con un mensaje de error y un código de estado 400 (Bad Request)
            return response()->json(['error' => 'ID inválido'], 400);
        }

        // Permitir que la solicitud continúe a la siguiente middleware o controlador
        return $next($request);
    }
}
