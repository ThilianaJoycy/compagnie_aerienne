<?php

namespace App\Repositories;

use App\Models\Escale;
use Illuminate\Database\Eloquent\Collection;
class EscaleRepository implements EscaleRepositoryInterface
{

    protected $vol;

	public function __construct(Escale $escale)
	{
		$this->escale = $escale;
	}

	public function create($heureArrivee, $heureDepart)
	{
		$escale = new $this->escale;
        $escale->heureDepart = $heureDepart;
        $escale->heureArrivee = $heureArrivee;

		$escale->save();


        return $escale;
	}

    

}