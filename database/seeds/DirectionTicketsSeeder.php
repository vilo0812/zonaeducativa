<?php

use App\Direction;
use App\DirectionTickets;
use App\Ticket;
use Illuminate\Database\Seeder;

class DirectionTicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /*start funcion para generar un codigo aleatorio*/
    public function token($longitud) {
         $key = '';
         $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
         $max = strlen($pattern)-1;
         for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
         return $key;
        }
        /*end funcion para generar un codigo aleatorio*/
    public function run()
    {
    	$DirectionIds = Direction::get('id');
    	$TicketsIds = Ticket::get('id');
    	foreach ($DirectionIds as $key => $item) {
    		foreach ($TicketsIds as $key => $ticket) {
    			DirectionTickets::create([
		        'direction_id' => $item['id'],
		        'ticket_id' => $ticket['id'],
		        'code' => $this->token(20)
		        ]);
    		}
    	}
    }
}
