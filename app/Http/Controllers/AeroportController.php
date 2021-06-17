<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AeroportRequest;
use App\Repositories\AeroportRepositoryInterface;
use App\Models\Aeroport;
use Illuminate\Http\Response;

class AeroportController extends Controller
{
    public function index(AeroportRepositoryInterface $aeroportRepository)
	{
		return response($aeroportRepository->Lister(), Response::HTTP_OK);
	}

    public function create(AeroportRequest $request, AeroportRepositoryInterface $aeroportRepository)
	{
        $aeroport=new Aeroport;
        $aeroport = $aeroportRepository->create($request->input('nom'));
		
		return response($aeroport->jsonSerialize(), Response::HTTP_OK);
	}

    public function airportByName($nom, AeroportRepositoryInterface $aeroportRepository)
	{
		return response($aeroportRepository->AeroportIdByName($nom), Response::HTTP_OK);
	}

    public function airportById($id, AeroportRepositoryInterface $aeroportRepository)
	{
		return response($aeroportRepository->AeroportIdById($id), Response::HTTP_OK);
	}
    //
}
