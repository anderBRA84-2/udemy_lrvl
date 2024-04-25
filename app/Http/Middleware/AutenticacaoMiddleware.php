<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao,$user ): Response /*$metodo_autenticacao recebe a string passada como parametro que foi passada na rota web */
    {
        $user = Auth::user();


        if ($metodo_autenticacao == 'padrao') {
            return response("Ola $user");

            // return $next($request);
        }else {
            return response('acesso negado usuario não autenticado');
        }

    }
}
