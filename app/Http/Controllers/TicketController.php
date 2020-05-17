<?php

namespace App\Http\Controllers;

use App\Direction;
use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class TicketController extends Controller
{
    public function show(){
    	return Ticket::get(['id','ticket']);
    }
    // start tickets solicitado
    public function ticket($id){
        $data = $this->getInfoTicket($id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->setPaper('a4');
        $pdf->loadView('pdf.ticket',compact('data'));
        return $pdf->stream();
    }
    // end tickets solicitado
    // start informacion del ticket
    public function getInfoTicket($id){
        $dir = Direction::findOrFail($id);
        $floor = $dir->floor->floor;
        $zone = $dir->zone->zone;
        $sector = $dir->sector->letter_code;
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
