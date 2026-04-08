<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Ucenik;
use App\Models\Roditelj;

class UcenikOrRoditeljMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        if ($user instanceof Ucenik || $user instanceof Roditelj) {
            return $next($request);
        }

        abort(403, 'Nemate prava za pristup.');
        
    }
}
