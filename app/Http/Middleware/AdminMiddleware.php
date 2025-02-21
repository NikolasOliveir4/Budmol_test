<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   public function handle(Request $request, Closure $next)
{
    // Verifica se o usuário está autenticado
    if (!auth()->check()) {
        return redirect('/login'); // Redireciona para a página de login
    }

    // Verifica se o usuário é um administrador
    if (auth()->user()->role !== 'admin') {
        return redirect('/events'); // Redireciona para a página de eventos
    }

    // Permite que a requisição continue
    return $next($request);
}
}