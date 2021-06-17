<?php

namespace App\Repositories;

interface PassagerRepositoryInterface
{

    public function create($nom, $prenom);
    public function passagerByNom($nom);
    //public function update($idAeroport, $nom);
   // public function Lister();

}