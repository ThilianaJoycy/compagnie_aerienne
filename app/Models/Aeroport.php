<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aeroport extends Model
{
    use HasFactory;

    protected $table = 'aeroport';

    public $timestamps = false;

    public function volsDepart()
	{
		return $this->hasMany('App\Models\Vol');
	}

    public function volsArrive()
	{
		return $this->hasMany('App\Models\Vol');
	}

    public function escales()
	{
		return $this->belongsToMany('App\Models\Escale');
	}

    public function villes()
	{
		return $this->hasMany('App\Models\VIlle');
	}
}
