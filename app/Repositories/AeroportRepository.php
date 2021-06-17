<?php

namespace App\Repositories;

use App\Models\Aeroport;
use Illuminate\Database\Eloquent\Collection;
class AeroportRepository implements AeroportRepositoryInterface
{

    protected $aeroport;

	public function __construct(Aeroport $aeroport)
	{
		$this->aeroport = $aeroport;
	}

	public function create($nom)
	{
		$aeroport = new $this->aeroport;
        $aeroport->nom = $nom;

        $aeroport->save();

        return $aeroport;
	}

    public function Lister()
	{
        return $aeroports = Aeroport::all();

        
	}

    public function AeroportIdByName($nom)
	{
        $column='nom';
        return $aeroports = Aeroport::where($column , '=', $nom)->first();

        
	}

    public function AeroportIdById($id)
	{
      
        return $aeroports = Aeroport::findOrFail($id);

        
	}

    
}