<?php

namespace App\Http\Controllers;

use App\Direction;
use App\DirectionTickets;
use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class TicketController extends Controller
{
    //start mostramos un ticket segun su id
    public function getTicketById($id){
    $dir = new DirectionTickets ();
    $data = $dir->ticketById($id);
    return response()->json($data[0],200);
    }
    //end mostramos un ticket segun su id
    //start devolvemos la informacion de los tickets segun el piso
    public function getTicketsByFloor ($floor){
        $ticket = new DirectionTickets();
         $data = $ticket->getTicketsByFloor($floor);
        return response()->json($data,200);
    }
    //end devolvemos la informacion de los tickets segun el piso
    //start devolvemos la informacion de los tickets segun el sector
    public function getTicketsBySector ($sector){
        $ticket = new DirectionTickets();
         $data = $ticket->getTicketsBySector($sector);
        return response()->json($data,200);
    }
    //end devolvemos la informacion de los tickets segun el sector
    //start get ticket funcion que arroja toda la informacion referente a todos los tickets
     public function getTickets(){
        $data = DirectionTickets::getTickets();
        return response()->json($data,200);
     }
    // end get ticket funcion que arroja toda la informacion referente a todos los tickets
    // start api que arma el ticket
    public function show($id){
        $ticket = DirectionTickets::findOrFail($id);
        $direction = $this->getInfoTicket($ticket->id);
        $type = Ticket::findOrFail($ticket->ticket_id);
        $data = [
            "id" => $ticket->id,
            "code" => $ticket->code, 
            "direction" => $direction,
            "type" => $type->ticket
        ];
        return response()->json($data,200);
    }
    // end api que arma el ticket
    // start api que muestra los id de los directioTickets
    public function showDirectionTicketsIds(){
        $tickets = DirectionTickets::all();
        return response()->json($tickets,200);
    }
    // start api que muestra los id de los directioTickets
    // start tickets solicitado
    // public function tickets(){
    //     $data = DirectionTickets::getTickets();
    //     $pdf = App::make('dompdf.wrapper');
    //     $pdf->setPaper('a4');
    //     $pdf->loadView('pdf.tickets',compact('data'));
    //     return $pdf->download();
    // }
    // end tickets solicitado
    // start ticket solicitado
    public function ticket($id){
        $dir = new DirectionTickets ();
        $data = $dir->ticketById($id);
        $direction = $this->getDirectionTicket($data);
        $ticket = strtoupper($data[0]->ticket);
        $code = $data[0]->code;
        $data = [
            "direction" => $direction,
            "ticket" => $ticket,
            "code" => $code
        ];
        $pdf = App::make('dompdf.wrapper');
        $pdf->setPaper('a4');
        $pdf->loadView('pdf.ticket',compact('data'));
        return $pdf->stream();
    }
    // end ticket solicitado
    // start informacion del ticket
    public function getDirectionTicket($data){
        // $dir = Direction::findOrFail($id);
        $floor =$data[0]->floor;
        $zone = $data[0]->zone;
        $sector = $data[0]->letter_code;
        $mensajeMin = $floor . ' - ' . $zone . ' - '. $sector;
        $mensaje = strtoupper($mensajeMin);
        return $mensaje;
    }
    // end informacion del ticket
    //start sacar la informacion del ticket
    public function checkCodeTicket (Request $request){
    decrypt($request->code);
    $cript = bcrypt($request->codeOne);
    if(Hash::check($request->codeTwo, $cript)){
        return 'funciona wey ;v';
    }else{  
        return 'no funciona wey :(';
    }
    // $encrupt = encrypt('hola');
    // $encrupt = decrypt($encrupt);
    }
    //end sacar la informacion del ticket
    // start funcion que permite update el cogido
    public function updateTickets(){
    $tickets = DirectionTickets::all();
    for ($i=0; $i < sizeof($tickets); $i++) { 
        $tickets[$i]->code = $this->token(20);
        $tickets[$i]->save();
    }
    return response()->json($tickets,200);
    }
    // end funcion que permite update el cogido
    //start api que saca los 3 tipos de tickets que existen
    public function showTickets(){
    $tickets = Ticket::get(['ticket','id']);
    return response()->json($tickets,200);
    }
    //end api que saca los 3 tipos de tickets que existen
    /*start funcion para generar un codigo aleatorio*/
    public function token($longitud) {
         $key = '';
         $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
         $max = strlen($pattern)-1;
         for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
         return $key;
        }
        /*end funcion para generar un codigo aleatorio*/
}
