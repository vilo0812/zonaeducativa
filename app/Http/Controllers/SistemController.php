<?php

namespace App\Http\Controllers;

use App\Sistem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Spatie\DbDumper\Databases\MySql;

class SistemController extends Controller
{
	//start agregamos la nueva copia de seguridad
    public function addCopy(){
    $name = 'securitycopy'.Carbon::now().'.sql';
    File::put(base_path('/database/'.$name),'');
    MySql::create()
        ->setDbName(env('DB_DATABASE'))
        ->setUserName(env('DB_USERNAME'))
        ->setPassword(env('DB_PASSWORD'))
        ->setHost(env('DB_HOST'))
        ->setPort(env('DB_PORT'))
        ->dumpToFile(base_path('/database/'.$name));
     $sistem = Sistem::create([
     	"copy" => $name
     ]);
    return response()->json([
            'mensaje'=>'Registro exitoso'],200);
    }
	//end agregamos la nueva copia de seguridad
	// start mostramos todas las copias de seguridad del sistema
    public function showCopies(){
    return Sistem::all();
    }
    //end mostramos todas las copias de seguridad del sistema
    //start eliminamos una copia de seguridad
    public function destroyCopy($id){
    $copy = Sistem::findOrFail($id);
    $name = $copy->copy; 
    unlink(base_path('database/'.$name));
    $copy->delete();
    return response()->json([
            'mensaje'=>'Copia Eliminada exitosamente'],200);
    }
    //end eliminamos una copia de seguridad
    //start vamos a instalar una copia de seguridad
    public function isntallCopy($id){
        $copy = Sistem::findOrFail($id);
        $name = $copy->copy;
        $sistem = Sistem::all();
        $data=array();
        foreach ($sistem as $item) {
            array_push($data,$item->copy);
        };
        DB::unprepared(file_get_contents(base_path('database/'.$name)));
        foreach ($data as $item) {
            Sistem::create([
                'copy' => $item
            ]);
        };
        return response()->json([
            'mensaje'=>'Copia Instalada Exitosamente'],200);
    }
    //end vamos a instalar una copia de seguridad
}
