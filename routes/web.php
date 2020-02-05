<?php

use App\Mail\UsuarioRegistrado;
use App\User;


/*start ruta para mandar emails*/
// Route::get('sendMail',function(){
// 	$mensaje=[
//         "contenido"=>"un nuevo usuario se ha registrado como administrador el Sistema de control de permanencias de la zona educativa",
//             'first_name'=>"gabriel",
//             'last_name'=>"viloria",
//             'identification_card'=>"27167028",
//             'email'=>"gabriel.viloria0812@gmail.com",
//             'phone'=>"04149017184",
//             'password'=>"1234",
//          ];
//      $first_name="gabriel";
//      $last_name="viloria";
//      $identification_card="27167028";
//      $email="gabriel.viloria0812@gmail.com";
//      $phone="04149017184";
//      $password="1234";
//      Mail::to($email)->send(new UsuarioRegistrado($first_name,$last_name,$identification_card,$email,$phone,$password));

// });
/*end ruta para mandar emails*/
/*start api que me permite ver todas las visitas que se han hecho en el edificio*/
	Route::get('showVisits','Controller@showVisitsPdf');
/*end api que me permite ver todas las visitas que se han hecho en el edificio*/
Route::get('/{any}', 'Controller@index')->where('any', '.*');
