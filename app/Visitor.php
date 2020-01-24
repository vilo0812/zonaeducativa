<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
	protected $fillable = [
        'user_id',
        'handling_time_id',
        'ticket_id',
        'direction_id',
        'belongings',
        'observation'
	];
	/*start metodo que me permite ver los datos de la visita */
	static public function showVisits(){
        $registro = static::leftJoin("users","visitors.user_id","=","users.id")
        ->join('handling_times',"visitors.handling_time_id","=","handling_times.id")
        ->select('visitors.id','first_name','last_name','identification_card','email','phone','input','output')
        ->get();
        return $registro;
    }
	/*end metodo que me permite ver los datos de la visita */
}
