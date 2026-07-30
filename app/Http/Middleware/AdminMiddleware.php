<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return $next($request);   //  Admin => laisse passer
        } else {
            return redirect(route(name: 'editor_dashboard'));  
        }
    }
    abort(code: 403);   // Pas connecté du tout => erreur 403
}
}
