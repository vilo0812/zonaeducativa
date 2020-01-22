<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Handling_floor extends Model
{
    public function zone($id){
    	$zona = static::leftJoin("sectors_zones","handling_floors.sector_zone_id","=","sectors_zones.id")
        ->join("zones","zones.id","=","sectors_zones.zone_id")
        ->select('zones.id','zones.zone')
        ->where("handling_floors.id",$id)
        ->get();
        return $zona;

    }
}
