<?php

namespace App\Repositories;

use App\Models\Reservation;
use App\Models\Vol;
use App\Models\Client;
use App\Models\Passager;
use Illuminate\Database\Eloquent\Collection;
class ReservationRepository implements ReservationRepositoryInterface
{

    protected $reservation;

	public function __construct(Reservation $reservation)
	{
		$this->reservation = $reservation;
	}

	public function create($dateReservation, $numero, $idClient, $idPassager, $idVol)
	{
		$reservation = new $this->reservation;
        $reservation->dateReservation = $dateReservation;
        $reservation->numero = $numero;
        $client =  Client::findOrFail($idClient);
        $passager =  Passager::findOrFail($idPassager);
        $vol =  Vol::findOrFail($idVol);
        $reservation->client()->associate($client);
        $reservation->passager()->associate($passager);
        $reservation->vol()->associate($vol);
        
        $reservation->statut = 'En attente';
		$reservation->save();

        return $reservation;
	}

    public function update($idReservation, $dateReservation, $numero, $idClient, $idPassager, $idVol)
	{
		$reservation =  Reservation::findOrFail($idReservation);
        $reservation->dateReservation = $dateReservation;
        $reservation->numero = $numero;
        $client =  Client::findOrFail($idClient);
        $passager =  Passager::findOrFail($idPassager);
        $vol =  Vol::findOrFail($idVol);
        $reservation->client()->associate($client);
        $reservation->passager()->associate($passager);
        $reservation->vol()->associate($vol);
		$reservation->update();
	}

    public function Lister()
	{
        $reservations = Reservation::all();
        $volsouverts=array();
        foreach ($reservations as $reservation) {
            $client =  Client::findOrFail($reservation->client_id);
            $passager =  Passager::findOrFail($reservation->passager_id);
            $vol =  Vol::findOrFail($reservation->vol_id);
            // $reservation=$client;
            // $reservation=$passager;
            // $reservation=$vol;
            $data=[
                "id"=>$reservation->id,
                "dateReservation"=> $reservation->dateReservation,
                "numero"=>$reservation->numero,
                "client"=>$client,
                "passager"=>$passager,
                "vol"=>$vol,
                "statut"=>$reservation->statut
            ];
                    
                
               $volsouverts[]=$data;           
        }
        
        return $volsouverts;

        
	}

    public function Confirmer($idReservation)
	{
		$reservation =  Reservation::findOrFail($idReservation);
        $reservation->statut='Confirmée';
        $reservation->update();
	}

    public function Annuler($idReservation)
	{
		$reservation =  Reservation::findOrFail($idReservation);
        $reservation->statut='Annulée';
        $reservation->update();
	}

    public function chercher($idVol)
	{
        $reservation =  Reservation::findOrFail($idVol);
        $client =  Client::findOrFail($reservation->client_id);
        $passager =  Passager::findOrFail($reservation->passager_id);
        $vol =  Vol::findOrFail($reservation->vol_id);;
        $data=[
            "id"=>$reservation->id,
            "dateReservation"=> $reservation->dateReservation,
            "numero"=>$reservation->numero,
            "client"=>$client,
            "passager"=>$passager,
            "vol"=>$vol,
            "statut"=>$reservation->statut
        ];
        return $data;

        
	}

}