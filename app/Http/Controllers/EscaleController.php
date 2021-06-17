<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EscaleRequest;
use App\Repositories\EscaleRepositoryInterface;
use App\Models\Escale;
use Illuminate\Http\Response;

class EscaleController extends Controller
{
    public function create(EscaleRequest $request, EscaleRepositoryInterface $escaleRepository)
	{
        $escale=new Escale;
        $escale = $escaleRepository->create($request->input('heureArrivee'), $request->input('heureDepart'));
		
		return response($escale->jsonSerialize(), Response::HTTP_OK);
	}
    //
}
