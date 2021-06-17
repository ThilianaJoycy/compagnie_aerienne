<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    use HasFactory;

    protected $table = 'vol';
    
    public $timestamps = false;

    public function reservations()
	{
		return $this->hasMany('App\Models\Reservation');
	}

    public function aeroportDepart()
	{
		return $this->belongsTo('App\Models\Aeroport');
	}

    public function aeroportArrive()
	{
		return $this->belongsTo('App\Models\Aeroport');
	}

    public function compagnies()
	{
		return $this->belongsToMany('App\Models\Compagnie');
	}

    public function escales()
	{
		return $this->belongsToMany('App\Models\Escale');
	}




}
