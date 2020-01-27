<?php

namespace App;

use App\Handling_time;
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
        ->join('directions',"visitors.direction_id","=","directions.id")
        ->join('sectors',"directions.sector_id","=","sectors.id")
        ->select('visitors.id','first_name','last_name','identification_card','phone','sector','input','output')
        ->get();
        return $registro;
    }
    /*end metodo que me permite ver los datos de la visita */
    /*start metodo que me permite ver los datos de la visita */
    static public function showOnlyNotTargetVisits(){
        $registro = static::leftJoin("users","visitors.user_id","=","users.id")
        ->join('handling_times',"visitors.handling_time_id","=","handling_times.id")
        ->join('directions',"visitors.direction_id","=","directions.id")
        ->join('sectors',"directions.sector_id","=","sectors.id")
        ->select('visitors.id','first_name','last_name','identification_card','phone','sector','input')
        ->where('output','=',null)
        ->get();
        return $registro;
    }
    /*end metodo que me permite ver los datos de la visita */
    /*start metodo que me devuelve el tiempo al que realizo cada visita*/
    public function handling_time(){
      return $this->belongsTo(Handling_time::class);
    }
    /*end metodo que me devuelve el tiempo al que realizo cada visita*/
}
