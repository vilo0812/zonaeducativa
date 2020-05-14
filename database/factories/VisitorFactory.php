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
        'ticket_id'=>$faker->randomElement([1,2,3]),
        'direction_id'=>$faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]),
        'provenance'=>$faker->address,
        'belongings'=>'',
        'observation'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});
