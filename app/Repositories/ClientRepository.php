<?php

namespace App\Repositories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;
class ClientRepository implements ClientRepositoryInterface
{

    protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function create($nom, $prenom, $tel, $email)
	{
		$client = new $this->client;
        $client->nom = $nom;
		$client->prenom = $prenom;
		$client->tel = $tel;
		$client->email = $email;

        $client->save();

        return $client;
	}

	public function clientByEmail($email)
	{
      
        $column='email';
        $client = Client::where($column , '=', $email)->first();
		if(!empty($client)){
			return $client;
		}
		else{
			return null;
		}

        
	}

    
}