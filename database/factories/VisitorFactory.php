<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DirectionTickets;
use App\Handling_time;
use App\Model;
use App\User;
use App\Visitor;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Visitor::class, function (Faker $faker) {
	$time=Handling_time::create([
            'input'=>Carbon::now()
        ]);
    $id = $faker->randomElement([2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]);
    $ticket = $faker->numberBetween($min = 1, $max = 135);
    $code_cedula = User::FindOrFail($id);
    $code_ticket = DirectionTickets::FindOrFail($ticket);
    return [
        'user_id'=>$id,
        'handling_time_id'=>$time->id,
        'direction_ticket_id'=>$ticket,
        'provenance'=>$faker->address,
        'belongings'=>'',
        'observation'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'code'=> $code_cedula->identification_card . '-' . $code_ticket->code
    ];
});
