<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Configuration;

class MaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $maintenance = Configuration::where('name', '=', 'maintenance-mode')->first();
        $isInMaintenance = $maintenance->value;
        $requestedRouteName = $request->route()->getName();

        if ($requestedRouteName !== 'maintenance' && $isInMaintenance) {
            return redirect()->route('maintenance');
        }

        if ($requestedRouteName === 'maintenance' && !$isInMaintenance) {
            return redirect()->route('home');
        }


        return $next($request);
    }
}
