<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPerfil
{

    public function handle(Request $request, Closure $next, ...$perfis): Response
    {
        $user = auth()->user();

        if (!$user || !$user->perfil) {
            abort(403);
        }

        if (!in_array($user->perfil->nome, $perfis)) {
                abort(403);
        }

        return $next($request);
    }
}
