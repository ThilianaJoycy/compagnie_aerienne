<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;



class VolTableSeeder extends Seeder {

public function run()
{
    DB::table('vol')->delete();

    Vol::create(
        ['dateDepart' => '2021-06-25'],
        ['dateArrivee' => '2021-06-27'],
        ['heureDepart' => '01:00'],
        ['heureArrivee' => '18:00'],
        ['aeroport_depart_id' => 1],
        ['aeroport_arrive_id' => 3],
        ['statut' => 1],
    );
    Vol::create(
        ['dateDepart' => '2021-06-15'],
        ['dateArrivee' => '2021-06-17'],
        ['heureDepart' => '01:00'],
        ['heureArrivee' => '18:00'],
        ['aeroport_depart_id' => 1],
        ['aeroport_arrive_id' => 3],
        ['statut' => 1],
    );
    Vol::create(
        ['dateDepart' => '2021-06-25'],
        ['dateArrivee' => '2021-06-27'],
        ['heureDepart' => '01:00'],
        ['heureArrivee' => '18:00'],
        ['aeroport_depart_id' => 1],
        ['aeroport_arrive_id' => 4],
        ['statut' => 1],
    );
    Vol::create(
        ['dateDepart' => '2021-06-25'],
        ['dateArrivee' => '2021-06-26'],
        ['heureDepart' => '04:00'],
        ['heureArrivee' => '08:00'],
        ['aeroport_depart_id' => 4],
        ['aeroport_arrive_id' => 3],
        ['statut' => 1],
    );
}


}