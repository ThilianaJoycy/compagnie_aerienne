<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;



class ReservationTableSeeder extends Seeder {

public function run()
{
    DB::table('reservation')->delete();

    Reservation::create(
        ['dateReservation' => '2021-06-22'],
        ['numero' => 'Res1Pass1'],
        ['statut' => 'En attente'],
        ['client_id' =>1],
        ['passager_id' => 1],
        ['vol_id' => 1],
    );
    Reservation::create(
        ['dateReservation' => '2021-06-22'],
        ['numero' => 'Res1Pass2'],
        ['statut' => 'En attente'],
        ['client_id' =>1],
        ['passager_id' => 2],
        ['vol_id' => 1],
    );
    Reservation::create(
        ['dateReservation' => '2021-06-12'],
        ['numero' => 'Res3Pass2'],
        ['statut' => 'En attente'],
        ['client_id' =>2],
        ['passager_id' => 2],
        ['vol_id' => 3],
    );
    Reservation::create(
        ['dateReservation' => '2021-06-20'],
        ['numero' => 'Res1Pass3'],
        ['statut' => 'En attente'],
        ['client_id' =>3],
        ['passager_id' => 3],
        ['vol_id' => 2],
    );
}


}

