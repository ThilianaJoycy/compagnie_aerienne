<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PassagerRequest;
use App\Repositories\PassagerRepositoryInterface;
use App\Models\Passager;
use Illuminate\Http\Response;

class PassagerController extends Controller
{
    public function create(PassagerRequest $request, PassagerRepositoryInterface $passagerRepository)
	{
        $passager=new Passager;
        $passager = $passagerRepository->create($request->input('nom'), $request->input('prenom'));
		
		return response($passager->jsonSerialize(), Response::HTTP_OK);
	}

    public function passagerByNom($nom, PassagerRepositoryInterface $passagerRepository)
	{
		return response($passagerRepository->passagerByNom($nom), Response::HTTP_OK);
	}
    //
}
