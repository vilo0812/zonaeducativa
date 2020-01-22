<?php

namespace App;

use App\Sector;
use App\Zone;
use Illuminate\Database\Eloquent\Model;

class Sectors_zones extends Model
{
	public function zones(){
      return $this->belongsTo(Zone::class);
    }
	public function sectors(){
      return $this->belongsTo(Sector::class);
    }
}
