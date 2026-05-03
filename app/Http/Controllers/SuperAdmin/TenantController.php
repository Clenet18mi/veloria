<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Inertia\Inertia;

class TenantController extends Controller
{
    public function index()
    {
        return Inertia::render('SuperAdmin/Tenants', [
            'tenants' => Tenant::all()
        ]);
    }

    public function impersonate(Tenant $tenant)
    {
        // Simple logic: impersonate the first establishment's director if needed
        // For now, redirecting back after impersonating a user within tenant
    }
}
