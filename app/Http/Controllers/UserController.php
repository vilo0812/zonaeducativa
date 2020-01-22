<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*start api que permita visualizar a los administradores trayendo solo el id y el nombre*/
    public function viewAdmins(){
        /*start sacamos solo a los usuarios administradores y los mandamos a la vista*/
    $admins=User::where('rol_id',2)->get(['id','first_name']);
    return response()->json(['admins'=>$admins],200);
        /*end sacamos solo a los usuarios administradores y los mandamos a la vista*/
    }
    /*end api que permita visualizar a los administradores trayendo solo el id y el nombre*/
    /*start api que me permita sacar la informacion de un solo usuario*/
    public function show(Request $request){
     $user = User::findOrFail($request->id);
     return response()->json(['user'=>$user], 200);
    // return response()->json('ruta funcional', 200);
    }
    /*end api que me permita sacar la informacion de un solo usuario */
    /*start api para actualizar a un usuario*/
    public function update(Request $request){
        $user = User::findOrFail($request->id);
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->identification_card=$request->identification_card;
        $user->save();
        return response()->json(['mensaje'=>'actualización exitosa'],200);
    }
    /*end api para actualizar a un usuario*/
    /*start api para actualizar a un usuario*/
    public function destroy(Request $request){
        $user = User::findOrFail($request->id);
        $user->delete();
        return response()->json(['mensaje'=>'usuario eliminado exitosamente'],200);
    }
    /*end api para actualizar a un usuario*/
}
