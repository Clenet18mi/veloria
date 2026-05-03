<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('establishment.{establishmentId}', function ($user, $establishmentId) {
    // Basic verification: user must belong to the establishment. 
    // In production, ensure User has establishment_id field or relation.
    return (int) $user->establishment_id === (int) $establishmentId;
});
