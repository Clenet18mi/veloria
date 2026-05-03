<?php

namespace App\Services\Billing;

use App\Models\Tenant;

class BillingService
{
    protected array $features = [
        'starter' => ['reservations'],
        'pro' => ['reservations', 'housekeeping', 'maintenance', 'crm'],
        'enterprise' => ['reservations', 'housekeeping', 'maintenance', 'crm', 'reports', 'analytics']
    ];

    public function canAccess(Tenant $tenant, string $feature): bool
    {
        $plan = $tenant->subscriptions()->latest()->first()?->plan ?? 'starter';
        return in_array($feature, $this->features[$plan] ?? []);
    }
}
