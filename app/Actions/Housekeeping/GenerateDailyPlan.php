<?php

namespace App\Actions\Housekeeping;

use App\Models\Room;
use App\Models\HousekeepingTask;
use Carbon\Carbon;

class GenerateDailyPlan
{
    public function handle(int $establishmentId)
    {
        // Find rooms with check-outs today
        $roomsToClean = Room::where('establishment_id', $establishmentId)
            ->whereHas('reservations', function ($query) {
                $query->where('check_out', Carbon::today());
            })->get();

        foreach ($roomsToClean as $room) {
            HousekeepingTask::create([
                'room_id' => $room->id,
                'status' => 'pending',
                'date' => Carbon::today(),
            ]);
        }
    }
}
