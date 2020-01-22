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
/*start apis que el super administrador usa para manejar a los administradores*/
	/*start api para registrar un administrador*/
	Route::post('registerAdmin','ManagingAdmin\ManagingAdminController@store');
	/*end api para registrar un administrador*/
	/*start api para ver un solo administrador*/
	Route::post('showAdmin','UserController@show');
	/*end api para ver un solo administrador*/
	/*start api para actualizar el administrador*/
	Route::put('updateAdmin','UserController@update');
	/*end api para actualizar el administrador*/
	/*start api para eliminar el administrador*/
	Route::post('deleteAdmin','UserController@destroy');
	/*end api para eliminar el administrador*/
/*end apis que el super administrador usa para manejar a los administradores*/
/*end apis que el super administrador usa para manejar a los administradores*/
	/*start api para ver a los administrador*/
	Route::get('viewAdmins','UserController@viewAdmins');
	/*end api api para ver a los administrador*/
	/*start api para ver a las zonas del edificio*/
	Route::get('viewZones','FloorController@viewZones');
	/*end api para ver a las zonas del edificio*/
	/*start api para ver los sectores que pertenecen a una zona en especifico del edificio*/
	Route::post('viewSectors','FloorController@viewSectors');
	/*end api para ver los sectores que pertenecen a una zona en especifico del edificio*/
/*end apis del super administrador*/
