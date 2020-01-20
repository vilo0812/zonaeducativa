<?php

use App\Zone;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /*start crearemos las zonas de la zona educativa*/
    public function run()
    {
        /*start agregamos la zona 1*/
        Zone::create([
        	"zone"=>"ZONA 1"
        ]);
        /*end agregamos la zona  1*/
        /*start agregamos la zona 2*/
        Zone::create([
        	"zone"=>"ZONA 2"
        ]);
        /*end agregamos la zona 2*/
        /*start agregamos la zona a*/
        Zone::create([
        	"zone"=>"ZONA A"
        ]);
        /*end agregamos la zona a*/
        /*start agregamos la zona b*/
        Zone::create([
        	"zone"=>"ZONA B"
        ]);
        /*end agregamos la zona b*/
        /*start agregamos la zona c*/
        Zone::create([
        	"zone"=>"ZONA C"
        ]);
        /*end agregamos la zona c*/
        /*start agregamos el despacho*/
        Zone::create([
        	"zone"=>"DESPACHO"
        ]);
        /*end agregamos el despacho*/
    }
    /*end crearemos las zonas de la zona educativa*/
}
