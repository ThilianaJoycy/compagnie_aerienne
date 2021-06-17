<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Repositories\ReservationRepositoryInterface;

class ReservationController extends Controller
{
    public function index(ReservationRepositoryInterface $reservationRepository)
	{
		return response($reservationRepository->Lister(), Response::HTTP_OK);
	}

    public function create(ReservationRequest $request, ReservationRepositoryInterface $reservationRepository)
	{
        $reservation=new Reservation;
        $reservation = $reservationRepository->create($request->input('dateReservation'), $request->input('numero'), $request->input('idClient'),  $request->input('idPassager'), $request->input('idVol'));
		
		return response($reservation->jsonSerialize(), Response::HTTP_OK);
	}

    public function update($id, ReservationRequest $request, ReservationRepositoryInterface $reservationRepository)
	{
        $reservationRepository->update($id, $request->input('dateReservation'), $request->input('numero'), $request->input('idClient'),  $request->input('idPassager'), $request->input('idVol'));
		
		return response(null, Response::HTTP_OK);
	}

    public function confirmer($id, ReservationRepositoryInterface $reservationRepository)
	{
        $reservationRepository->Confirmer($id);
		
		return response(null, Response::HTTP_OK);
	}

    public function annuler($id, ReservationRepositoryInterface $reservationRepository)
	{
        $reservationRepository->Annuler($id);
		
		return response(null, Response::HTTP_OK);
	}
    //
}
