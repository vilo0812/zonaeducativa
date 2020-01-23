<?php

namespace App;

use App\Direction;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    /*start relacion entre zones y sectores*/
    public function zones(){
        return $this->belongsToMany(Zone::class,'directions');
    }
    /*start relacion entre zones y sectores*/
    /*start relacion con direcciones*/
    public function direcciones(){
        return $this->hasMany(Direction::class);
    }
    /*end relacion con direcciones*/
}
