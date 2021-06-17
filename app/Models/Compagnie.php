<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compagnie extends Model
{
    use HasFactory;

    protected $table = 'compagnie';

    public $timestamps = false;

    public function vols()
	{
		return $this->belongsToMany('App\Models\Vol');
	}
}
