<?php

use App\Mail\UsuarioRegistrado;
use App\User;

//start ruta para ver la bitacora en PDF
Route::get('verBitacora/{id}','UserController@viewBitacore');
//end ruta para ver la bitacora en PDF
//start ruta para descargar la bitacora
Route::get('DescargarBitacora/{id}','UserController@DownloadBitacore');
//end ruta para descargar la bitacora
// start ruta para la creacion de tickets
Route::get('ticket/{id}','TicketController@ticket');
// end ruta para la creacion de tickets
/*start api que me permite descargar todas las visitas que se han hecho en el edificio*/
Route::get('downloadPdf/{id}','VisitorController@downloadPdf');
		/*end api que me permite descargar todas las visitas que se han hecho en el edificio*/
/*start api que me permite ver todas las visitas que se han hecho en el edificio*/
	Route::get('verVisitas/{id}','VisitorController@viewPdf');
/*end api que me permite ver todas las visitas que se han hecho en el edificio*/
Route::get('/{any}', 'Controller@index')->where('any', '.*');
