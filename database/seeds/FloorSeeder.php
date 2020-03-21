<?php

use App\Floor;
use Illuminate\Database\Seeder;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /*start creamos los pisos de el edificio fundabit*/
    public function run()
    {
      /*start integramos la planta baja*/
      Floor::create([
            "floor"=>"planta baja",
            "letter_code"=>"a",
      ]);
      /*end integramos la planta baja*/
      /*start integramos la piso 1*/
      Floor::create([
            "floor"=>"piso 1",
            "letter_code"=>"b",
      ]);
      /*end integramos la piso 1*/
      /*start integramos la piso 2*/
      Floor::create([
            "floor"=>"piso 2",
            "letter_code"=>"c",
      ]);
      /*end integramos la piso 2*/
      /*start integramos la piso 3*/
      Floor::create([
            "floor"=>"piso 3",
            "letter_code"=>"d",
      ]);
      /*end integramos la piso 3*/
    }
    /*end creamos los pisos de el edificio fundabit*/
}
