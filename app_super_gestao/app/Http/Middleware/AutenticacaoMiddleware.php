<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil, $param3, $param4)
    {
        if ($metodo_autenticacao == "padrao"){
            echo 'Verificar usuário e senha no bando de dados';
        } 
        if ($metodo_autenticacao){
            echo 'Verificar usuário e senha no AD';
        }
        if($perfil == 'visitante'){
            echo 'exibir alguns recursos';
        }else{
            echo 'carregar dados do DB';
        }
        //return $next($request);
        return Response('Acesso negado. Usuário não autenticado.');
    }
}
