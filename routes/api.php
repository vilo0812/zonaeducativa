<?php

use Illuminate\Http\Request;
/*start apis de sesiones*/
Route::group(['prefix' => 'sesion'], function() {
	/*start api para iniciar sesion*/
	Route::post('iniciar','ViloAuth\SessionsController@iniciarSesion');
	/*end api para iniciar sesion*/
	/*start api para cerrar sesion*/
	Route::get('cerrar','ViloAuth\SessionsController@cerrarSesion');
	/*end api para cerrar sesion*/
	/*start verificamos que tipo de usuario es*/
	Route::get('rol','ViloAuth\SessionsController@rol');
	/*end verificamos que tipo de usuario es*/
});
/*end apis de sesiones*/
/*start apis del super administrador*/

	/*start api para registrar un administrador*/
	Route::post('registerAdmin','SuperAdminController@store');
	/*end api para registrar un administrador*/
/*end apis del super administrador*/
