<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AsegurarIdPositivo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('id');

        if (!is_numeric($id) || (int)$id <= 0) {
            return response()->json([
                'message' => 'El id debe ser un entero positivo.'
            ], 400);
        }

        return $next($request);
    }
}
