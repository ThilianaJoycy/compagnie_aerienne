<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    
    use HasFactory;

    protected $table = 'reservation';

    public $timestamps = false;

    public function client()
	{
		return $this->belongsTo('App\Models\Client');
	}

    public function passager()
	{
		return $this->belongsTo('App\Models\Passager');
	}

    public function vol()
	{
		return $this->belongsTo('App\Models\Vol');
	}
}
