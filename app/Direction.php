<?php

namespace App;

use App\sector;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    public function sectorOfZoneFloor($floor,$zone){
    	/*start hacemos la consulta que me permite ver todos los sectores de ese piso y zona*/
    	$sector = static::join("sectors","directions.sector_id","=","sectors.id")
    	->where([['directions.zone_id',$zone],['directions.floor_id',$floor]])
    	->select('sector')
    	->get();
    	/*end hacemos la consulta que me permite ver todos los sectores de ese piso y zona*/
        return $sector;
    }
	public function sector(){
      return $this->belongsTo(sector::class);
    }
}
