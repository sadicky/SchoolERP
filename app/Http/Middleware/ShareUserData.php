<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ShareUserData
{
    public function handle($request, Closure $next)
    {
        // Partager les données de l'utilisateur avec toutes les vues
        view()->share('authUser', Auth::user());
        
        return $next($request);
    }
}
