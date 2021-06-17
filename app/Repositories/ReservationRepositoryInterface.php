<?php

namespace App\Repositories;

interface ReservationRepositoryInterface
{

    public function create($dateReservation, $numero, $idClient, $idPassager, $idVol);
    public function Confirmer($idReservationVol);
    public function Annuler($idReservationVol);
    public function update($idReservation, $dateReservation, $numero, $idClient, $idPassager, $idVol);
    public function Lister();

}