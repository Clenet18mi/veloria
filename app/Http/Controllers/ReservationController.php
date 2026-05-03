<?php

namespace App\Http\Controllers;

use App\Actions\Reservations\CreateReservation;
use App\Http\Requests\Reservations\StoreReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ReservationController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Reservations/Index', [
            'reservations' => Reservation::all(),
        ]);
    }

    public function store(StoreReservationRequest $request, CreateReservation $createReservation): RedirectResponse
    {
        $createReservation->handle($request->validated(), $request->user()->id);

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    }
}
