<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class AeroportTableSeeder extends Seeder {

public function run()
{
    DB::table('aeroport')->delete();

    Aeroport::create(['nom' => 'Aeroport de Nsimalen']);
    Aeroport::create(['nom' => 'Aeroport de Bafoussam']);
    Aeroport::create(['nom' => 'Aeroport de Paris']);
    Aeroport::create(['nom' => 'Aeroport de Londres']);
}

}