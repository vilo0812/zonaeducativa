<?php

namespace App;

use App\Visitor;
use Illuminate\Database\Eloquent\Model;

class DirectionTickets extends Model
{
     protected $fillable = [
       'direction_id',
       'ticket_id',
       'code',
    ];
    public $timestamps = false;
//start scopes
    ///startscope scope de code
      public function scopeCode($query,$code){
          return $query->where('code','LIKE',"%$code%");
      }
      ///end scope de code
//ends
    /*start metodo que permite ver toda la informacion de todos los tickets */
    static public function getTickets(){
        $registro = static::leftJoin("tickets","direction_tickets.ticket_id","=","tickets.id")
        ->join('directions',"direction_tickets.direction_id","=","directions.id")
        ->join('floors','directions.floor_id',"=",'floors.id')
        ->join('zones','directions.zone_id',"=",'zones.id')
        ->join('sectors','directions.sector_id',"=",'sectors.id')
        ->select('direction_tickets.id','ticket','code','floor','zone','sectors.letter_code')
        ->get();
        return $registro;
    }
    /*end metodo  que permite ver toda la informacion de todos los tickets*/
    // start funcion para buscar los ticket segun el id
    public function ticketById($id){
        $registro = static::leftJoin("tickets","direction_tickets.ticket_id","=","tickets.id")
        ->join('directions',"direction_tickets.direction_id","=","directions.id")
        ->join('floors','directions.floor_id',"=",'floors.id')
        ->join('zones','directions.zone_id',"=",'zones.id')
        ->join('sectors','directions.sector_id',"=",'sectors.id')
        ->where('direction_tickets.id','=',$id)
        ->select('direction_tickets.id','ticket','code','floor','zone','sectors.letter_code')
        ->get();
        return $registro;
        // $registro = static::leftJoin("tickets","direction_tickets.ticket_id","=","tickets.id")
        // ->join('directions',
        //     "direction_tickets.ticket_id",
        //     "=",
        //     "directions.id")
        // ->join('floors','directions.floor_id','=','floors.id')
        // ->join('zones','directions.zone_id','=','zones.id')
        // ->join('sectors','directions.sector_id','=','sectors.id')
        // ->where('direction_tickets.id','=',$id)
        // ->select('ticket','directions.id','code','floor','zone','sectors.letter_code')
        // ->get();
        return $registro;
    }
    // end funcion para buscar los ticket segun el id
    // start funcion para buscar los ticket segun el id
    public function getTicketsByFloor($id){
        $registro = static::leftJoin("tickets","direction_tickets.ticket_id","=","tickets.id")
        ->join('directions',"direction_tickets.direction_id","=","directions.id")
        ->join('floors','directions.floor_id',"=",'floors.id')
        ->join('zones','directions.zone_id',"=",'zones.id')
        ->join('sectors','directions.sector_id',"=",'sectors.id')
        ->where('directions.floor_id','=',$id)
        ->select('direction_tickets.id','ticket','code','floor','zone','sectors.letter_code')
        ->get();
        return $registro;
    }
    // end funcion para buscar los ticket segun el id
    // start funcion para buscar los ticket segun el id
    public function getTicketsBySector($id){
        $registro = static::leftJoin("tickets","direction_tickets.ticket_id","=","tickets.id")
        ->join('directions',"direction_tickets.direction_id","=","directions.id")
        ->join('floors','directions.floor_id',"=",'floors.id')
        ->join('zones','directions.zone_id',"=",'zones.id')
        ->join('sectors','directions.sector_id',"=",'sectors.id')
        ->where('directions.sector_id','=',$id)
        ->select('direction_tickets.id','ticket','code','floor','zone','sectors.letter_code')
        ->get();
        return $registro;
    }
    // end funcion para buscar los ticket segun el id
    
}
