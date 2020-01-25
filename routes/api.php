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
/*start apis que tienen que ver con el modulo de visitas*/
	/*start api para registrar cada visita en el edificio*/
	Route::post('storeVisit','VisitorController@store');
	/*end api para registrar cada visita en el edificio*/
	/*start api para ver todas las visitas en el edificio*/
	Route::get('showVisits','VisitorController@show');
	/*start api para ver todas las visitas en el edificio*/
	/*start api que manejan los PDFs de la aplicacion*/
		/*start api que me permite descargar todas las visitas que se han hecho en el edificio*/
		Route::get('pdfVisits','Pdf\PdfController@download');
		/*end api que me permite descargar todas las visitas que se han hecho en el edificio*/
	/*end api que manejan los PDFs de la aplicacion*/
/*end apis que tienen que ver con el modulo de visitas*/
/*end apis del super administrador StoreVisit*/
/*start apis para sacar informacines especificas*/
	/*start api para ver a los administrador*/
	Route::get('viewAdmins','UserController@viewAdmins');
	/*end api api para ver a los administrador*/
	/*start api para ver los pisos del edificio*/
	Route::get('viewFloors','DirectionController@viewFloors');
	/*end api para ver a las zonas del edificio*/
	/*start api para ver los pisos del edificio*/
	Route::post('viewZones','DirectionController@viewZones');
	/*end api para ver a las zonas del edificio*/
	/*start api para ver los sectores que pertenecen a una zona en especifico del edificio*/
	Route::post('viewSectors','DirectionController@viewSectors');
	/*end api para ver los sectores que pertenecen a una zona en especifico del edificio*/
	/*start api sacar el id de la direccion segun 3 id*/
	Route::post('directionId','DirectionController@directionId');
	/*end api sacar el id de la direccion segun 3 id*/
	/*start api para ver los pases permitidos de la zona*/
	Route::get('viewTickets','TicketController@viewTickets');
	/*end api para ver los pases permitidos de la zona*/
/*end apis para sacar informacines especificas*/
