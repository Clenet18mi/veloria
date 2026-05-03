<?php

namespace App\Services\YieldManagement;

use App\Models\RoomType;

class YieldEngine
{
    public function calculateSuggestedPrice(RoomType $roomType): float
    {
        $occupancyRate = $roomType->rooms()->where('status', 'occupied')->count() / $roomType->rooms()->count();
        
        // Logic: if occupancy > 80%, price +20%. If < 30%, price -10%.
        $multiplier = 1.0;
        if ($occupancyRate > 0.8) $multiplier = 1.2;
        if ($occupancyRate < 0.3) $multiplier = 0.9;
        
        return $roomType->base_price * $multiplier;
    }
}
