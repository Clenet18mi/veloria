<?php

namespace App\Actions\Reservations;

use App\Models\Reservation;
use App\Events\ReservationCreated;
use Illuminate\Support\Facades\DB;

class CreateReservation
{
    public function handle(array $data, int $userId): Reservation
    {
        return DB::transaction(function () use ($data, $userId) {
            $reservation = Reservation::create([
                'establishment_id' => app('current_establishment')->id,
                'client_id' => $data['client_id'],
                'room_id' => $data['room_id'],
                'check_in' => $data['check_in'],
                'check_out' => $data['check_out'],
                'adults' => $data['adults'],
                'children' => $data['children'] ?? 0,
                'rate' => $data['rate'],
                'status' => 'pending_confirmation',
                'created_by' => $userId,
            ]);

            event(new ReservationCreated($reservation));

            return $reservation;
        });
    }
}
