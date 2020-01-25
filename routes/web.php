<?php
/*start api que me permite ver todas las visitas que se han hecho en el edificio*/
	Route::get('showVisits','Pdf\PdfController@index');
/*end api que me permite ver todas las visitas que se han hecho en el edificio*/
Route::get('/{any}', 'Controller@index')->where('any', '.*');
