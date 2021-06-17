<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $table = 'ville';

    public $timestamps = false;

    public function aeroports()
	{
		return $this->belongsToMany('App\Models\Aeroport');
	}
}
