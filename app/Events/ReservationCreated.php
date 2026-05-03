<?php

namespace App\Events;

use App\Models\Reservation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReservationCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Reservation $reservation)
    {
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('establishment.' . $this->reservation->establishment_id),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->reservation->id,
            'status' => $this->reservation->status,
            'room_id' => $this->reservation->room_id,
        ];
    }
}
