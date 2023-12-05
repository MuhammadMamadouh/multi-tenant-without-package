<?php

namespace App\Http\Middleware;

use App\Facades\Tenant as FacadesTenant;
use App\Models\Tenant;
use App\Service\TenantService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();
        $tenant = Tenant::where('domain',$host)->first();
        FacadesTenant::switchToTenant($tenant);
        return $next($request);
    }
}
