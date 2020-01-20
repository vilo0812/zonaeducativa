<?php

namespace App\Http\Controllers;

use App\User;
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
}
