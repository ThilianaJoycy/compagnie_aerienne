<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


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