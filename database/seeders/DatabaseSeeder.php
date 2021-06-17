<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // DB::table('aeroport')->delete();

        \App\Models\Aeroport::create(['nom' => 'Aeroport de Nsimalen']);
        \App\Models\Aeroport::create(['nom' => 'Aeroport de Bafoussam']);
        \App\Models\Aeroport::create(['nom' => 'Aeroport de Paris']);
        \App\Models\Aeroport::create(['nom' => 'Aeroport de Londres']);

        // DB::table('client')->delete();

        \App\Models\Client::create(
            ['nom' => 'Essomba',
            'prenom' => 'Markus',
            'tel' => '678484720',
            'email' => 'Markus@gmail.com'],
        );
        \App\Models\Client::create(
            ['nom' => 'MBOLA',
            'prenom' => 'Nicolas',
            'tel' => '678477720',
            'email' => 'mbola@gmail.com'],
        );
        \App\Models\Client::create(
            ['nom' => 'KAMDEM',
            'prenom' => 'Mike',
            'tel' => '678884720',
            'email' => 'kam@gmail.com'],
        );
        \App\Models\Client::create(
            ['nom' => 'FOKA',
            'prenom' => 'Simon',
            'tel' => '678489920',
            'email' => 'mine@gmail.com'],
        );

        // DB::table('passager')->delete();

        \App\Models\Passager::create(
            ['nom' =>'Essomba',
            'prenom' => 'Markus'],
        );
        \App\Models\Passager::create(
            ['nom' =>'Pettit',
            'prenom' => 'Pays'],
        );
        \App\Models\Passager::create(
            ['nom' =>'DONKE',
            'prenom' => 'Marius'],
        );
        \App\Models\Passager::create(
            ['nom' =>'NANA',
            'prenom' => 'Romeo'],
        );

        // DB::table('reservation')->delete();

        \App\Models\Vol::create(
            ['dateDepart' => '2021-06-25',
            'dateArrivee' => '2021-06-27',
            'heureDepart' => '01:00',
            'heureArrivee' => '18:00',
            'aeroport_depart_id' => 1,
            'aeroport_arrive_id' => 3,
            'statut' => 1],
        );
        \App\Models\Vol::create(
            ['dateDepart' => '2021-06-15',
            'dateArrivee' => '2021-06-17',
            'heureDepart' => '01:00',
            'heureArrivee' => '18:00',
            'aeroport_depart_id' => 1,
            'aeroport_arrive_id' => 3,
            'statut' => 1],
        );
        \App\Models\Vol::create(
            ['dateDepart' => '2021-06-25',
            'dateArrivee' => '2021-06-27',
            'heureDepart' => '01:00',
            'heureArrivee' => '18:00',
            'aeroport_depart_id' => 1,
            'aeroport_arrive_id' => 4,
            'statut' => 1],
        );
        \App\Models\Vol::create(
            ['dateDepart' => '2021-06-25',
            'dateArrivee' => '2021-06-26',
            'heureDepart' => '04:00',
            'heureArrivee' => '08:00',
            'aeroport_depart_id' => 4,
            'aeroport_arrive_id' => 3,
            'statut' => 1],
        );

        \App\Models\Reservation::create(
            ['dateReservation' => '2021-06-22',
            'numero' => 'Res1Pass1',
            'statut' => 'En attente',
            'client_id' =>1,
            'passager_id' => 1,
            'vol_id' => 1],
        );
        \App\Models\Reservation::create(
            ['dateReservation' => '2021-06-22',
            'numero' => 'Res1Pass2',
            'statut' => 'En attente',
            'client_id' =>1,
            'passager_id' => 2,
            'vol_id' => 1],
        );
        \App\Models\Reservation::create(
            ['dateReservation' => '2021-06-12',
            'numero' => 'Res3Pass2',
            'statut' => 'En attente',
            'client_id' =>2,
            'passager_id' => 2,
            'vol_id' => 3],
        );
        \App\Models\Reservation::create(
            ['dateReservation' => '2021-06-20',
            'numero' => 'Res1Pass3',
            'statut' => 'En attente',
            'client_id' =>3,
            'passager_id' => 3,
            'vol_id' => 2],
        );


    }

    
}

class AeroportTableSeeder extends Seeder {

    public function run()
    {
       
    }

}

class ClientTableSeeder extends Seeder {

    public function run()
    {
        DB::table('client')->delete();

        Client::create(
            ['nom' => 'Essomba'],
            ['prenom' => 'Markus'],
            ['tel' => '678484720'],
            ['email' => 'Markus@gmail.com'],
        );
        Client::create(
            ['nom' => 'MBOLA'],
            ['prenom' => 'Nicolas'],
            ['tel' => '678477720'],
            ['email' => 'mbola@gmail.com'],
        );
        Client::create(
            ['nom' => 'KAMDEM'],
            ['prenom' => 'Mike'],
            ['tel' => '678884720'],
            ['email' => 'kam@gmail.com'],
        );
        Client::create(
            ['nom' => 'FOKA'],
            ['prenom' => 'Simon'],
            ['tel' => '678489920'],
            ['email' => 'mine@gmail.com'],
        );
    }

}


class PassagerTableSeeder extends Seeder {

    public function run()
    {
        
    }

}

class VolTableSeeder extends Seeder {

    public function run()
    {
        
    }
    

}

class ReservationTableSeeder extends Seeder {

    public function run()
    {
        
    }
    

}

