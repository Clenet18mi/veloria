<?php

namespace App\Http\Middleware;

use App\Models\Establishment;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetTenantScope
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Resolution by X-Tenant-Id header for dev/API, or session for web
        $establishmentId = $request->header('X-Tenant-Id') ?? session('establishment_id');

        if ($establishmentId) {
            $establishment = Establishment::find($establishmentId);
            
            if ($establishment) {
                session(['establishment_id' => $establishment->id]);
                // Register in container for global access if needed
                app()->instance('current_establishment', $establishment);
            }
        }

        return $next($request);
    }
}
