<?php

use App\Bitacore;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BitacoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Bitacore::create([
    	'user_id' => 2,
    	'action_id' => 1,
    	'details' => 'hizo un registro de entrada del visitante Carlos Francisco a la zona de FUNDABIT',
    	'input' => $time=Carbon::now()
    ]);
    }
}
