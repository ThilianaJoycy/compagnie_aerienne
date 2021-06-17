<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\VolRequest;
use App\Models\Vol;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Repositories\VolRepositoryInterface;

class VolController extends Controller
{
    public function index(VolRepositoryInterface $volRepository)
	{
		return response($volRepository->Lister(), Response::HTTP_OK);
	}

    public function create(VolRequest $request, VolRepositoryInterface $volRepository)
	{
        $vol=new Vol;
        $vol = $volRepository->create($request->input('dateDepart'), $request->input('dateArrivee'), $request->input('heureDepart'),  $request->input('heureArrivee'), $request->input('aeroportDepart'), $request->input('aeroportArrive'), $request->input('escales'));
		
		return response($vol->jsonSerialize(), Response::HTTP_OK);
	}

    public function update($id, VolRequest $request, VolRepositoryInterface $volRepository)
	{
        $volRepository->update($id, $request->input('dateDepart'), $request->input('dateArrivee'), $request->input('heureDepart'),  $request->input('heureArrivee'), $request->input('aeroportDepart'), $request->input('aeroportArrive'), $request->input('escales'));
		
		return response(null, Response::HTTP_OK);
	}

    public function fermer($id, VolRepositoryInterface $volRepository)
	{
        $volRepository->fermer($id);
		
		return response(null, Response::HTTP_OK);
	}

    public function chercher($id, VolRepositoryInterface $volRepository)
	{
        $vol=new Vol;
        $vol=$volRepository->chercher($id);
		
		return response($vol->jsonSerialize(), Response::HTTP_OK);
	}
}
