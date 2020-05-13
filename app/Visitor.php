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
    //start visitas paginadas
    static public function showPageVisits(){
        $registro = static::leftJoin("users","visitors.user_id","=","users.id")
        ->join('handling_times',"visitors.handling_time_id","=","handling_times.id")
        ->join('directions',"visitors.direction_id","=","directions.id")
        ->join('sectors',"directions.sector_id","=","sectors.id")
        ->select('visitors.id','first_name','last_name','identification_card','phone','sector','input','output')
        ->orderBy('visitors.id', 'DESC')
        ->paginate(30);
        return $registro;
    }
    //start visitas paginadas
    /*start metodo que me permite ver los datos de la visita */
    static public function showVisits(){
        $registro = static::leftJoin("users","visitors.user_id","=","users.id")
        ->join('handling_times',"visitors.handling_time_id","=","handling_times.id")
        ->join('directions',"visitors.direction_id","=","directions.id")
        ->join('sectors',"directions.sector_id","=","sectors.id")
        ->select('visitors.id','first_name','last_name','identification_card','phone','sector','input','output')
        ->orderBy('visitors.id', 'DESC')
        ->get();
        return $registro;
    }
    /*end metodo que me permite ver los datos de la visita */
    /*start metodo que me permite ver las visitas que iran en el PDF*/
    static public function showVisitsPdf(){
        $registro = static::leftJoin("users","visitors.user_id","=","users.id")
        ->join('handling_times',"visitors.handling_time_id","=","handling_times.id")
        ->join('directions',"visitors.direction_id","=","directions.id")
        ->join('sectors',"directions.sector_id","=","sectors.id")
        ->join('tickets','visitors.ticket_id','=','tickets.id')
        ->select('visitors.id','first_name','last_name','identification_card','phone','sector','input','output','provenance','observation','ticket')
        ->orderBy('visitors.id', 'DESC')
        ->get();
        return $registro;
    }
    /*end metodo que me permie ver las visitas que iran en el PDF */
    /*start metodo que me permite ver los datos de la visita */
    static public function showOnlyNotTargetVisits(){
        $registro = static::leftJoin("users","visitors.user_id","=","users.id")
        ->join('handling_times',"visitors.handling_time_id","=","handling_times.id")
        ->join('directions',"visitors.direction_id","=","directions.id")
        ->join('sectors',"directions.sector_id","=","sectors.id")
        ->select('visitors.id','first_name','last_name','identification_card','phone','sector','input')
        ->where('output','=',null)
        ->orderBy('visitors.id', 'DESC')
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
