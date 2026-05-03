<?php

namespace App\Policies;

use App\Models\Reservation;
use App\Models\User;

class ReservationPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('reservation.view');
    }

    public function view(User $user, Reservation $reservation): bool
    {
        return $user->can('reservation.view') && $reservation->establishment_id === app('current_establishment')->id;
    }

    public function create(User $user): bool
    {
        return $user->can('reservation.create');
    }

    public function update(User $user, Reservation $reservation): bool
    {
        return $user->can('reservation.update') && $reservation->establishment_id === app('current_establishment')->id;
    }
}
