<?php

use App\Mail\UsuarioRegistrado;
use App\User;
/*start api que me permite descargar todas las visitas que se han hecho en el edificio*/
Route::get('pdfVisits','Controller@downloadPdf');
		/*end api que me permite descargar todas las visitas que se han hecho en el edificio*/
/*start api que me permite ver todas las visitas que se han hecho en el edificio*/
	Route::get('showVisits','Controller@showVisitsPdf');
/*end api que me permite ver todas las visitas que se han hecho en el edificio*/
Route::get('/{any}', 'Controller@index')->where('any', '.*');
