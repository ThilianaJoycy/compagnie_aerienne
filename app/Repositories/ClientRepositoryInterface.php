<?php

namespace App\Repositories;

interface ClientRepositoryInterface
{

    public function create($nom, $prenom, $tel, $email);
    public function clientByEmail($email);
    //public function update($idAeroport, $nom);
   // public function Lister();

}