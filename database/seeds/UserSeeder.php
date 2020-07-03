<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /*start creamos a los usuarios*/
    public function run()
    {

    	/*start super administrador*/
        $route = public_path('images/users/27167028');
        if (!file_exists($route)) {
            mkdir($route, 0777, true);
        }
        $imgRoute = public_path('images/default/default.jpg');
        $imgRouteCopy = public_path('images/users/27167028/default.jpg');
        copy($imgRoute,$imgRouteCopy);
        User::create([
            "first_name"=>"Gabriel Antonio",
            "last_name"=>"Viloria Aparicio",
            "identification_card"=>"27167028",
            "email"=>"gabriel.viloria0812@gmail.com",
            "phone"=>"04149017184",
            "password"=>bcrypt("1234"),
            'picture' => 'default.jpg',
            "rol_id"=>1
        ]);
        // $route = public_path('images/users/26666666');
        // if (!file_exists($route)) {
        //     mkdir($route, 0777, true);
        // }
        // $imgRoute = public_path('images/default/default.jpg');
        // $imgRouteCopy = public_path('images/users/26666666/default.jpg');
        // copy($imgRoute,$imgRouteCopy);
        // User::create([
        //     "first_name"=>"Miguel",
        //     "last_name"=>"Padron",
        //     "identification_card"=>"26666666",
        //     "email"=>"miguelpadron1234@gmail.com",
        //     "phone"=>"04149017183",
        //     "password"=>bcrypt("1234"),
        //     'picture' => 'default.jpg',
        //     "rol_id"=>2
        // ]);
        // factory(User::class, 20)->create();
    	/*end super administrador*/
    }
    /*end creamos a los usuarios*/
}
