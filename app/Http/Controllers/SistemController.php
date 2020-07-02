<?php

namespace App\Http\Controllers;

use App\Sistem;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Spatie\DbDumper\Databases\MySql;

class SistemController extends Controller
{
	//start agregamos la nueva copia de seguridad
    public function addCopy(){
    $name = 'securitycopy'.Carbon::now();
    $nameBackup = $name.'.sql';
    $backupRoute = base_path('database/backups/'.$name);
    if (!file_exists($backupRoute)) {
        mkdir($backupRoute, 0777, true);
    }
    $usersBackup = User::all();
    if(!empty($usersBackup)){
        foreach ($usersBackup as $item) {
            $route = public_path('images/users/'.$item['identification_card']);
            $backupRouteUser = $backupRoute.'/'.$item['identification_card'];
            if (!file_exists($backupRouteUser)) {
                mkdir($backupRouteUser, 0777, true);
            }
            if(!empty($item->picture)){
                $imgRoute = $backupRouteUser.'/'.$item->picture;
                if(!file_exists($imgRoute)){
                    $imgRouteCopy = $route.'/'.$item->picture;
                    $imgRoutePaste = $backupRouteUser.'/'.$item->picture;
                    copy($imgRouteCopy,$imgRoutePaste);
                }
            }
            if(!empty($item->sign)){
                $imgRoute = $backupRouteUser.'/'.$item->sign;
                if(!file_exists($imgRoute)){
                    $signRouteCopy = $route.'/'.$item->sign;
                    $signRoutePaste = $backupRouteUser.'/'.$item->sign;
                    copy($signRouteCopy,$signRoutePaste);
                }
            }
        };
    }
    File::put(base_path('database/backups/'.$nameBackup),'');
    MySql::create()
        ->setDbName(env('DB_DATABASE'))
        ->setUserName(env('DB_USERNAME'))
        ->setPassword(env('DB_PASSWORD'))
        ->setHost(env('DB_HOST'))
    
        ->setPort(env('DB_PORT'))
        ->dumpToFile(base_path('database/backups/'.$nameBackup));
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
    unlink(base_path('database/backups/'.$name.'.sql'));
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
        $backupSistemData=array();
        foreach ($sistem as $item) {
            array_push($backupSistemData,$item->copy);
        };
        $backupRoute = base_path('database/backups/'.$name);
        $backupDatabaseRoute = base_path('database/backups/'.$name.'.sql');
        $backupUsersData = User::all();
        if(!empty($backupUsersData)){
            foreach ($backupUsersData as $item) {
                $route = public_path('images/users/'.$item['identification_card']);
                if (file_exists($route)) {
                    if(!empty($item->picture)){
                        $imgRoute = $route.'/'.$item->picture;
                        if(file_exists($imgRoute)){
                            unlink($imgRoute);
                        }
                    }
                    if(!empty($item->sign)){
                        $signRoute = $route.'/'.$item->sign;
                        if(file_exists($signRoute)){
                            unlink($signRoute);
                        }
                    }
                    rmdir($route);
                }
            };
        }
        DB::unprepared(file_get_contents($backupDatabaseRoute));
        Sistem::query()->delete();
        if(sizeof($backupSistemData)){
        foreach ($backupSistemData as $item) {
            Sistem::create([
                'copy' => $item
            ]);
        };
        }
        $usersBackup = User::all();
        if(!empty($usersBackup)){
            foreach ($usersBackup as $item) {
                $backupRouteUser = base_path('database/backups/'.$name.'/'.$item['identification_card']);
                $route = public_path('images/users/'.$item['identification_card']);
                if (!file_exists($route)) {
                    mkdir($route, 0777, true);
                }
                if (file_exists($route)){
                    if(!empty($item->picture)){
                        $imgRoute = $route.'/'.$item->picture;
                        if(!file_exists($imgRoute)){
                        $imgRouteCopy = $backupRouteUser.'/'.$item->picture;
                        $imgRoutePaste = $route.'/'.$item->picture;
                        copy($imgRouteCopy,$imgRoutePaste);
                        }
                    }
                    if(!empty($item->sign)){
                        $signRoute = $route.'/'.$item->sign;
                        if(!file_exists($signRoute)){
                        $signRouteCopy = $backupRouteUser.'/'.$item->sign;
                        $signRoutePaste = $route.'/'.$item->sign;
                        copy($signRouteCopy,$signRoutePaste);
                        }
                    }
                    
                }
            };
        }
        return response()->json([
            'mensaje'=>'Copia Instalada Exitosamente'],200);
    }
    //end vamos a instalar una copia de seguridad
    //start backup
    public function backup(){
        $sistem = Sistem::all();
        $backupSistemData = array();
        if(sizeof($sistem)){
        foreach ($sistem as $item) {
            array_push($backupSistemData,$item->copy);
        }
        }
        $backupUsersData = User::all();
        if(!empty($backupUsersData)){
            foreach ($backupUsersData as $item) {
                $route = public_path('images/users/'.$item['identification_card']);
                if (file_exists($route)) {
                    if(!empty($item->picture)){
                        $imgRoute = $route.'/'.$item->picture;
                        if(file_exists($imgRoute)){
                            unlink($imgRoute);
                        }
                    }
                    if(!empty($item->sign)){
                        $signRoute = $route.'/'.$item->sign;
                        if(file_exists($signRoute)){
                            unlink($signRoute);
                        }
                    }
                    rmdir($route);
                }
            };
        }
       DB::unprepared(file_get_contents(base_path('database/default/default.sql')));
       Sistem::query()->delete();
       if(sizeof($backupSistemData)){
       foreach ($backupSistemData as $item) {
            Sistem::create([
                'copy' => $item
            ]);
        };
       }
       return response()->json([
            'mensaje'=>'Restauración exitosa'],200);
    }
    //end backup
}
