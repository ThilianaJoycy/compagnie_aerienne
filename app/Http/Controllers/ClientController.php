<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ClientRequest;
use App\Repositories\ClientRepositoryInterface;
use App\Models\Client;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    public function create(ClientRequest $request, ClientRepositoryInterface $clientRepository)
	{
        $client=new Client;
        $client = $clientRepository->create($request->input('nom'),$request->input('prenom'), $request->input('tel'), $request->input('email'));
		
		return response($client->jsonSerialize(), Response::HTTP_OK);
	}

    public function clientByEmail($email, ClientRepositoryInterface $clientRepository)
	{
		return response($clientRepository->clientByEmail($email), Response::HTTP_OK);
	}
    //
}
