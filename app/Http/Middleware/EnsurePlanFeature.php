<?php

namespace App\Http\Middleware;

use App\Services\Billing\BillingService;
use Closure;
use Illuminate\Http\Request;

class EnsurePlanFeature
{
    public function __construct(protected BillingService $billing) {}

    public function handle(Request $request, Closure $next, string $feature)
    {
        $tenant = app('current_establishment')->tenant;

        if (!$this->billing->canAccess($tenant, $feature)) {
            return redirect()->route('billing.upgrade')->with('error', 'Upgrade your plan to access this feature.');
        }

        return $next($request);
    }
}
