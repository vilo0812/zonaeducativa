<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    /*start relacion entre zones y sectores*/
    public function zones(){
        return $this->belongsToMany(Zone::class,'directions');
    }
    /*start relacion entre zones y sectores*/
}
