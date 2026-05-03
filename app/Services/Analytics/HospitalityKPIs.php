<?php

namespace App\Services\Analytics;

use App\Models\Reservation;
use App\Models\Room;

class HospitalityKPIs
{
    public function getRevPAR($establishmentId): float
    {
        $totalRooms = Room::where('establishment_id', $establishmentId)->count();
        $totalRevenue = Reservation::where('establishment_id', $establishmentId)->where('status', 'checked_out')->sum('total_price');
        
        return $totalRooms > 0 ? ($totalRevenue / $totalRooms) : 0;
    }

    public function getGOPPAR($establishmentId): float
    {
        // Gross Operating Profit = Revenue - Operating Expenses
        $revenue = Reservation::where('establishment_id', $establishmentId)->sum('total_price');
        $expenses = 0; // Integration point with maintenance/staffing costs
        
        return ($revenue - $expenses) / Room::where('establishment_id', $establishmentId)->count();
    }
}
