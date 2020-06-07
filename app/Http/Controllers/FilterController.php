<?php

namespace App\Http\Controllers;

use App\DirectionTickets;
use App\User;
use Illuminate\Http\Request;

class FilterController extends Controller
{
//start api para filtrar segun la cedula
    public function filterOfVerificationTicketByIc($ic){
    $user = User::leftJoin("visitors","visitors.user_id","=","users.id")
        ->join('handling_times',"visitors.handling_time_id","=","handling_times.id")
        ->join("direction_tickets","direction_tickets.id","=","visitors.direction_ticket_id")
        ->join("tickets","direction_tickets.ticket_id","=","tickets.id")
        ->join('directions',"direction_tickets.direction_id","=","directions.id")
        ->join('floors','directions.floor_id',"=",'floors.id')
        ->join('zones','directions.zone_id',"=",'zones.id')
        ->join('sectors','directions.sector_id',"=",'sectors.id')
        ->orderBy('visitors.id','desc')
        ->identificationcard($ic)
        ->select('users.id','users.first_name','users.last_name','users.identification_card','ticket','sector','code','floor','zone','sectors.letter_code','direction_tickets.id','ticket','input')
    ->paginate(5);
    return $user;
    }
//start api para filtrar segun la cedula
//start api para filtrar segun el codigo del ticket
    public function filterOfVerificationTicketByCode($code){
    $user = DirectionTickets::leftJoin("visitors","visitors.direction_ticket_id","=","direction_tickets.id")
    	->join("users","users.id","=","visitors.user_id")
        ->join('handling_times',"visitors.handling_time_id","=","handling_times.id")
        ->join("tickets","direction_tickets.ticket_id","=","tickets.id")
        ->join('directions',"direction_tickets.direction_id","=","directions.id")
        ->join('floors','directions.floor_id',"=",'floors.id')
        ->join('zones','directions.zone_id',"=",'zones.id')
        ->join('sectors','directions.sector_id',"=",'sectors.id')
        ->orderBy('visitors.id','desc')
        ->code($code)
        ->select('users.id','users.first_name','users.last_name','users.identification_card','ticket','sector','code','floor','zone','sectors.letter_code','direction_tickets.id','ticket','input')
    ->paginate(5);
    return $user;
    }
//end api para filtrar segun el codigo del ticket
}
