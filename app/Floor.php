<?php

namespace App;

use App\Zone;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
	/*start relacion entre zones y floors*/
	public function zones(){
        return $this->belongsToMany(Zone::class,'directions');
    }
    /*start relacion entre zones y floors*/
}
