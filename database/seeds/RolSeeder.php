<?php

use App\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /*start roles de los usuarios //super	 admin//admin//visitante//*/
    public function run()
    {
        /*start creamos el super admin*/
        Rol::create([
        	"rol"=>"Super Admin"
        ]);
        /*end creamos el super admin*/
        /*start creamos el admin*/
        Rol::create([
        	"rol"=>"Admin"
        ]);
        /*end creamos el super admin*/
        /*start creamos el visitante*/
        Rol::create([
        	"rol"=>"visitante"
        ]);
        /*end creamos el visitante*/
    }
    /*end roles de los usuarios//super admin//admin//visitante//*/
}
