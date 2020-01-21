<?php

namespace App\Http\Controllers;

use App\User;
use App\Zone;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    /*start api que me permita registrar a nuevos administradores*/
    public function store(Request $request){

    	User::create([
    		'first_name'=>$request['first_name'],
    		'last_name'=>$request['last_name'],
    		'identification_card'=>$request['identification_card'],
    		'email'=>$request['email'],
    		'phone'=>$request['phone'],
    		'rol_id'=>2
    	]);
    	return response()->json(['mensaje'=>'registro exitoso'],200);

    }
    /*end api que me permita registrar a nuevos administradores*/
    /*start api que permita visualizar a los administradores*/
    public function viewAdmins(){
        /*start sacamos solo a los usuarios administradores y los mandamos a la vista*/
    $admins=User::all()->where('rol_id',2)->pluck('first_name');
    return response()->json(['admins'=>$admins],200);
        /*end sacamos solo a los usuarios administradores y los mandamos a la vista*/
    }
    /*end api que permita visualizar a los administradores*/
    /*start ver todas las zonas disponibles*/
    public function viewZones(){
    $zones=Zone::get(['id','zone']);
    return response()->json(['zones'=>$zones],200);
    }
    /*end ver las zonas disponibles*/
    /*start ver todas los sectores segun su zona*/
    public function viewSectors(Request $request){
    $sectors=Zone::find($request->id)->sectors()->get(['sector']);
    return response()->json($sectors,200);
    }
    /*end ver todas los sectores segun su zona*/
}
