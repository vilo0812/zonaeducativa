<?php

namespace App;

use App\Visitor;
use Illuminate\Database\Eloquent\Model;

class Handling_time extends Model
{
	public $timestamps = false;
    protected $fillable = [
       'input',
       'output'
    ];
    /*start relacion con visitor*/
    public function Visitors(){
        return $this->hasMany(Visitor::class);
    }
    /*end relacion con visitor*/
}
