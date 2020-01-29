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
        /*start api que permite ver las zonas y sectores dependiendo de el id del piso*/
    static public function viewZonesAndSectors($Floor_id){
        $sector = static::join("sectors","directions.sector_id","=","sectors.id")
        ->join("zones","directions.zone_id","=","zones.id")
        ->where([["directions.floor_id",$Floor_id]])
        ->select('directions.id','sectors.sector','zones.zone')
        ->get();
        return $sector;
    }
        /*end api que permite ver las zonas y sectores dependiendo de el id del piso*/
    /*start api que permite ver el sector de cada zona*/
    public function sector(){
      return $this->belongsTo(sector::class);
    }
    /*end api que permite ver el sector de cada zona*/
}
