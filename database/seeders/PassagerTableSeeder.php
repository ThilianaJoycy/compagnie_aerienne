<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class PassagerTableSeeder extends Seeder {

public function run()
{
    DB::table('passager')->delete();

    Passager::create(
        ['nom' =>'Essomba'],
        ['prenom' => 'Markus'],
    );
    Passager::create(
        ['nom' =>'Pettit'],
        ['prenom' => 'Pays'],
    );
    Passager::create(
        ['nom' =>'DONKE'],
        ['prenom' => 'Marius'],
    );
    Passager::create(
        ['nom' =>'NANA'],
        ['prenom' => 'Romeo'],
    );
}

}