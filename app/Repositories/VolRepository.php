<?php

namespace App\Repositories;

use App\Models\Vol;
use App\Models\Aeroport;
use App\Models\Escale;
use Illuminate\Database\Eloquent\Collection;
class VolRepository implements VolRepositoryInterface
{

    protected $vol;

	public function __construct(Vol $vol)
	{
		$this->vol = $vol;
	}

	public function create($dateDepart, $dateArrivee, $heureDepart, $heureArrivee, $aeroportDepart, $aeroportArrive, $escales)
	{
		$vol = new $this->vol;
        $vol->dateDepart = $dateDepart;
        $vol->dateArrivee = $dateArrivee;
        $vol->heureDepart = $heureDepart;
        $vol->heureArrivee = $heureArrivee;
        $aeroportDepart1 =  Aeroport::findOrFail($aeroportDepart);
        $aeroportArrive1 =  Aeroport::findOrFail($aeroportArrive);
        $vol->aeroportDepart()->associate($aeroportDepart1);
        $vol->aeroportArrive()->associate($aeroportArrive1);
        
        $vol->statut = 1;
		$vol->save();
        if(!empty($escales)){
            foreach ($escales as $escale) {
                $escale1 =  Escale::findOrFail($escale);
                $vol->escales()->attach($escale1);     
            }
            $vol->save();
        }
        

        return $vol;
	}

    public function update($idVol, $dateDepart, $dateArrivee, $heureDepart, $heureArrivee, $aeroportDepart, $aeroportArrive, $escales)
	{
		$vol =  Vol::findOrFail($idVol);
        $vol->dateDepart = $dateDepart;
        $vol->dateArrivee = $dateArrivee;
        $vol->heureDepart = $heureDepart;
        $vol->heureArrivee = $heureArrivee;
        $aeroportDepart1 =  Aeroport::findOrFail($aeroportDepart);
        $aeroportArrive1 =  Aeroport::findOrFail($aeroportArrive);
        $vol->aeroportDepart()->associate($aeroportDepart1);
        $vol->aeroportArrive()->associate($aeroportArrive1);
        $vol->escales()->detach();
        $vol->update();
        if(!empty($escales)){
            foreach ($escales as $escale) {
                $escale1 =  Escale::findOrFail($escale);
                $vol->escales()->attach($escale1);     
            }
            $vol->update();
        }
	}

    public function Lister()
	{
        $vols = Vol::all();
        $volsouverts=array();
        foreach ($vols as $vol) {
            if($vol->statut==1){
                $aeroportDepart=Aeroport::findOrFail($vol->aeroport_depart_id);
                $aeroportArrive=Aeroport::findOrFail($vol->aeroport_arrive_id);
                $data=[
                    "id"=>$vol->id,
                    "dateDepart"=> $vol->dateDepart,
                    "dateArrivee"=>$vol->dateArrivee,
                    "heureDepart"=>$vol->heureDepart,
                    "heureArrivee"=>$vol->heureArrivee,
                    "aeroportDepart"=>$aeroportDepart->nom,
                    "aeroportArrive"=>$aeroportArrive->nom
                ];
                    
                
               $volsouverts[]=$data;
            }
            
        }
        return $volsouverts;

        
	}

    public function chercher($idVol)
	{
        $vol =  Vol::findOrFail($idVol);
        return $vol;

        
	}

    public function fermer($idVol)
	{
		$vol =  Vol::findOrFail($idVol);
        $vol->statut=0;
        $vol->update();
	}

}