<?php

namespace App\Repositories;

use App\Models\Passager;
use Illuminate\Database\Eloquent\Collection;
class PassagerRepository implements PassagerRepositoryInterface
{

    protected $passager;

	public function __construct(Passager $passager)
	{
		$this->passager = $passager;
	}

	public function create($nom, $prenom)
	{
		$passager = new $this->passager;
        $passager->nom = $nom;
		$passager->prenom = $prenom;

        $passager->save();

        return $passager;
	}

	public function passagerByNom($nom)
	{
      
        $column='nom';
        $passager = Passager::where($column , '=', $nom)->first();
		if(!empty($passager)){
			return $passager;
		}
		else{
			return null;
		}

        
	}

    
}