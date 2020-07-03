<?php

namespace App;

use App\Direction;
use App\Zone;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    public $timestamps = false;
	/*start relacion entre zones y floors*/
	public function zones(){
        return $this->belongsToMany(Zone::class,'directions');
    }
    /*start relacion entre zones y floors*/
    /*start relacion con direcciones*/
    public function direcciones(){
        return $this->hasMany(Direction::class);
    }
    /*end relacion con direcciones*/
}
