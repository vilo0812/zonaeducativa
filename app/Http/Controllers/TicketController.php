<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function show(){
    	return Ticket::get(['id','ticket']);
    }
}
