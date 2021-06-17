<?php

namespace App\Repositories;

interface AeroportRepositoryInterface
{

    public function create($nom);
    //public function delete($idAeroport);
    //public function update($idAeroport, $nom);
    public function Lister();
    public function AeroportIdByName($nom);
    public function AeroportIdById($id);

}