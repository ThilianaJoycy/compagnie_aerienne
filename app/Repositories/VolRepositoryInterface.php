<?php

namespace App\Repositories;

interface VOlRepositoryInterface
{

    public function create($dateDepart, $dateArrivee, $heureDepart, $heureArrivee, $aeroportDepart, $aeroportArrive, $escales);
    public function fermer($idVol);
    public function update($idVol, $dateDepart, $dateArrivee, $heureDepart, $heureArrivee, $aeroportDepart, $aeroportArrive, $escales);
    public function Lister();
    public function chercher($idVol);

}