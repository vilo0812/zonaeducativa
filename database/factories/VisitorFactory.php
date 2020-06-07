<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Handling_time;
use App\Model;
use App\Visitor;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Visitor::class, function (Faker $faker) {
	$time=Handling_time::create([
            'input'=>Carbon::now()
        ]);
    return [
        'user_id'=>$faker->randomElement([2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]),
        'handling_time_id'=>$time->id,
        'direction_ticket_id'=>$faker->numberBetween($min = 1, $max = 135),
        'provenance'=>$faker->address,
        'belongings'=>'',
        'observation'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});
