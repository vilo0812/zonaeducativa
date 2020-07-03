<?php

use App\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::create([
        "ticket"=>"visitante"
        ]);
        Ticket::create([
        "ticket"=>"provisional"
        ]);
        Ticket::create([
        "ticket"=>"video conferencia"
        ]);
    }
}
