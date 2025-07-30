<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

//Un middleware est dédié à l'inspection et au filtrage des requêtes http
//ici vérification du role enregistré pour l'utilisateur : si admin la requête continue sinon refus
class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }
        return redirect('/')->with('error', 'Accès non autorisé au panneau d\'administration.');
    }
}
