<?php

namespace App;

use App\Sector;
use App\Sectors_zones;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
	/*start relacion entre zones_sectors*/
	public function zones_sectors(){
        return $this->hasMany(Sectors_zones::class);
    }
    /*start relacion entre zones_sectors*/
	/*start traaemos el id y el nombre de los sectores*/
    public function sectors(){
        return $this->belongsToMany(Sector::class,'sectors_zones');
    }
	/*endtraaemos el id y el nombre de los sectores*/
}
