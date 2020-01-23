<?php

namespace App;

use App\Direction;
use App\sector;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    	/*start hacemos la consulta que me permite ver todos los sectores de ese piso y zona*/
    public function sectorOfZoneFloor($floor,$zone){
    	$sector = static::join("sectors","directions.sector_id","=","sectors.id")
    	->where([['directions.zone_id',$zone],['directions.floor_id',$floor]])
    	->select('sectors.id','sector')
    	->get();
        return $sector;
    }
    	/*end hacemos la consulta que me permite ver todos los sectores de ese piso y zona*/
	public function sector(){
      return $this->belongsTo(sector::class);
    }
}
