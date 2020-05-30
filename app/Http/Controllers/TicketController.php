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
    public function ticket($id){
        $dir = new DirectionTickets ();
        $data = $dir->getTicketById($id);
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
    // end tickets solicitado
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
    // start funcion que permite sacar el codigo
    public function getCodeTicket(){
    // $obj = new Controller();
    // return $obj->token(3);

    
    }
}
