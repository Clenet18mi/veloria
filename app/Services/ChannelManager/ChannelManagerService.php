<?php

namespace App\Services\ChannelManager;

use App\Models\Reservation;

interface ChannelProvider
{
    public function syncReservation(Reservation $reservation);
    public function updateAvailability(int $roomId, int $availability);
}

class ChannelManagerService
{
    public function sync(string $channel, Reservation $reservation)
    {
        // Strategy pattern: dispatch to Booking/Expedia/Airbnb provider
    }
}
