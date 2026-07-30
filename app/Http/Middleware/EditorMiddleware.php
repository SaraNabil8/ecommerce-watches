<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class EditorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if (Auth::check()){
            $user = Auth::user();
            if ($user->isAdmin()) {
                return redirect(route(name: 'admin_dashboard'));   // Admin => redirigé
            } else if ($user->isEditor()) {
                return $next($request);   // Editor => laissé passer
            }
        }
        abort(code: 403);   // Pas connecté du tout => erreur 403
    }

}
