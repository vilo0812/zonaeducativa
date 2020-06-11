<?php

use Illuminate\Http\Request;

/*start apis de sesiones*/
Route::group(['prefix' => 'sesion'], function() {
	/*start api para iniciar sesion*/
	Route::post('login','Controller@login');
	/*end api para iniciar sesion*/
	/*start api para recuperar la contraseña*/
	Route::post('recoverPassword','Controller@recoverPassword');
	/*end api para recuperar la contraseña*/
	/*start api para verificar el codigo de cambio de contraseña*/
	Route::post('code','Controller@code');
	/*end api para verificar el codigo de cambio de contraseña*/
	/*start api para cambiar la contraseña*/
	Route::post('newPassword','Controller@newPassword');
	/*end api para cambiar la contraseña*/
});
Route::group([
    'middleware' => 'jwt.auth',
], function ($router) {
/*end apis de sesiones*/
/*start apis del super administrador*/
/*start apis que el super administrador usa para manejar a los administradores*/
	/*start api para registrar un administrador*/
	Route::post('storeAdmin','UserController@storeAdmin');
	/*end api para registrar un administrador*/
	/*start api para registrar un jefe de zona*/
	Route::post('storeLeaderZone','UserController@storeLeaderZone');
	/*end api para registrar un jefe de zona*/
	/*start api para ver un solo administrador*/
	Route::get('showUser/{id}','UserController@show');
	/*end api para ver un solo administrador*/
	/*start api para actualizar el administrador*/
	Route::put('updateUser','UserController@update');
	/*end api para actualizar el administrador*/
	/*start api para eliminar el administrador*/
	Route::delete('deleteUser/{id}','UserController@destroy');
	/*end api para eliminar el administrador*/
/*end apis que el super administrador usa para manejar a los administradores*/
/*start apis que tienen que ver con el modulo de visitas*/
	/*start api para registrar cada visita en el edificio*/
	Route::post('storeVisit','VisitorController@store');
	/*end api para registrar cada visita en el edificio*/
	/*start api para ver todas las visitas en el edificio*/
	Route::get('showVisits','VisitorController@show');
	/*start api para ver todas las visitas en el edificio*/
	/*start api para ver todas las visitas en el edificio*/
	Route::get('showPageVisits','VisitorController@showPageVisits');
	/*start api para ver todas las visitas en el edificio*/
	/*start api que me permite mostrar solo a los usuarios que no han salido del edificio en un lapso de 2 semanas*/
	Route::get('showOnlyNotTargetVisits','VisitorController@showOnlyNotTargetVisits');
	/*start api que me permite mostrar solo a los usuarios que no han salido del edificio en un lapso de 2 semanas*/
	/*start api que permite marcar la hora de salida de los visitantes*/
	Route::patch('targetVisit','VisitorController@update');
	/*start api que permite marcar la hora de salida de los visitantes*/
	/*start api que manejan los PDFs de la aplicacion*/
	/*end api que manejan los PDFs de la aplicacion*/
/*end apis que tienen que ver con el modulo de visitas*/
/*start api para cambiar la disponibilidad de las dependencias*/
	Route::post('changeStateDependence','DirectionController@changeStateDependence');
/*end api para cambiar la disponibilidad de las dependencias*/
/*start api para ver la disponibilidad de las dependencias*/
	Route::get('stateDependence/{idFloor}/{idZone}/{idSector}','DirectionController@stateDependence');
/*end api para ver la disponibilidad de las dependencias*/
/*end apis del super administrador StoreVisit*/
/*start apis para sacar informacines especificas*/
	/*start api para ver a los administrador*/
	Route::get('viewAdmins','UserController@viewAdmins');
	/*end api api para ver a los administrador*/
	/*start api para ver a los Jefes de Zona*/
	Route::get('viewLeadersZone','UserController@viewLeadersZone');
	/*end api api para ver a los Jefes de Zona*/
	// start api para ver a jefes de zona y admins
	Route::get('viewUsers','UserController@viewUsers');
	/*start api para ver los pisos del edificio*/
	Route::get('viewFloors','DirectionController@viewFloors');
	/*end api para ver a las zonas del edificio*/
	/*start api para ver los sectores del edificio*/
	Route::get('viewSectors','DirectionController@viewSectors');
	/*end api para ver a los sectores del edificio*/
	/*start api para ver las zonas y sectores de un sector*/
	Route::get('showZonesAndSectors/{id}','DirectionController@showZonesAndSectors');
	/*end api para ver a las zonas y sectores de un sector*/
	/*start api para ver los sectores que pertenecen a una zona en especifico del edificio*/
	Route::get('showSectors/{idFloor}/{idZone}','DirectionController@showSectors');
	/*end api para ver los sectores que pertenecen a una zona en especifico del edificio*/
	/*start api sacar el id de la direccion segun 3 id*/
	Route::post('directionId','DirectionController@directionId');
	/*end api sacar el id de la direccion segun 3 id*/
//start apis de ticket generales
	// start api que saca toda la informacion de todos los tickets
		Route::get('getTickets','TicketController@getTickets');
	// end api que saca toda la informacion de todos los tickets
	//start api que muestra los tickets
		Route::get('showTickets','TicketController@showTickets');
	//end api que muestra los tickets
//end apis de ticket generales
	// start ticket por su id
	Route::get('getTicketByIdgetTicketById/{id}','TicketController@getTicketById');
	// end ticket por su id
	// start api que saca toda la informacion de todos los tickets segun el piso
	Route::get('getTicketsByFloor/{floor}','TicketController@getTicketsByFloor');
	// end api que saca toda la informacion de todos los tickets segun el piso
	// start api que saca toda la informacion de todos los tickets segun el sector
	Route::get('getTicketsBySector/{sector}','TicketController@getTicketsBySector');
	// end api que saca toda la informacion de todos los tickets segun el sector
	//start actualizar tickets
	Route::post('updateTickets','TicketController@updateTickets');
	//end actualizar tickets
	/*start api para ver la información de una usuario*/
	Route::get('showUserByIc/{id}','UserController@showByIdentificationCard');
	/*end api para ver la información de una usuario*/
	//start api para mostrar las bitacoras de un usuario segun su id
	Route::get('showBitacoreByUserId/{id}','BitacoreController@showBitacoreByUserId');
	//end api para mostrar las bitacoras de un usuario segun su id
	//start api para registar en la bitacora la accion de visualizar los pdfs
	Route::post('storeBitacore','BitacoreController@storeBitacoreViewVisits');
	//end api para registar en la bitacora la accion de visualizar los pdfs
/*end apis para sacar informacines especificas*/
//start filtros
// Route::post('filterTicket','FilterController@filterOfVerificationTicketByIc');
//end filtros
//start api de filtro
Route::get('searchBitacore/{id}/{dato}','BitacoreController@searchBitacore');//filtro para bitacoras
Route::get('searchUser/{dato}','UserController@searchUser');//filtro para usuarios
Route::get('searchTicket/{dato}','TicketController@searchTicket');//filtro para tickets
Route::get('searchVisit/{dato}','VisitorController@searchVisit');//filtro para visits
//end api de filtro
//start ruta para restaurar la base de datos
Route::get('backup','Controller@backup');
//end ruta para restaurar la base de datos
});