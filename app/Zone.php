<?php

namespace App;

use App\Floor;
use App\Sector;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    /*start relacion entre zones y floors*/
    public function floors(){
        return $this->belongsToMany(Floor::class,'directions');
    }
    /*start relacion entre zones y floors*/
    /*start relacion entre zones y sectores*/
    public function sectors(){
        return $this->belongsToMany(Sector::class,'directions');
    }
    /*start relacion entre zones y sectores*/
    /*start relacion con direcciones*/
    public function direcciones(){
        return $this->hasMany(Direction::class);
    }
    /*end relacion con direcciones*/
}
