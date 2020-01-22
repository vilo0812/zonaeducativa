<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
	/*start */
    public function handling_floors(){
        return $this->hasMany(han ::class);
    }
}
