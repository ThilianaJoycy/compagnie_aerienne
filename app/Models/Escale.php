<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escale extends Model
{
    use HasFactory;

    protected $table = 'escale';

    public $timestamps = false;

    public function vols()
	{
		return $this->belongsToMany('App\Models\Vol');
	}

    public function aeroports()
	{
		return $this->belongsToMany('App\Models\Aeroport');
	}
}
