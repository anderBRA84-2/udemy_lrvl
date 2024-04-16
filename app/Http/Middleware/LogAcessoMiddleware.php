<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\{
    LogAcesso,
};

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       $ip = $request->server->get('REMOTE_ADDR');
       $route = $request->getRequestUri();//atributo de campo unico é recuperado com getNomeDoAtributo
       LogAcesso::create(['log' => " o IP $ip acessou a rota $route"]);//com " " podemos interpolar a varial sem a necessidade de concatenar
       return $next($request);// continua o fluxo da requisição após registrar o log de acesso
    }
}
