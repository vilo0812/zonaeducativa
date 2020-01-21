<?php

namespace App;

use App\Sector;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
	/*start traaemos el id y el nombre de los sectores*/
    public function sectors(){
        return $this->belongsToMany(Sector::class,'sectors_zones');
    }
	/*endtraaemos el id y el nombre de los sectores*/
}
