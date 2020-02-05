<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\UsuarioRegistrado;
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
    /*start api que permite registart un usuario normales que visitan el edificio*/
    public function store($first_name,$last_name,$identification_card,$email,$phone){
        User::create([
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'identification_card'=>$identification_card,
            'email'=>$email,
            'phone'=>$phone,
            'rol_id'=>3
        ]);
        return 'registro exitoso';
    }
    /*end api que permite registart un usuario*/
    /*start api que me permita registrar a nuevos administradores*/
    public function storeAdmin(Request $request){

        User::create([
            'first_name'=>$request['first_name'],
            'last_name'=>$request['last_name'],
            'identification_card'=>$request['identification_card'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'password'=>bcrypt($request['password']),
            'rol_id'=>2
        ]);
     Mail::to("fundabit02@gmail.com")->send(new UsuarioRegistrado($request['first_name'],$request['last_name'],$request['identification_card'],$request['email'],$request['phone'],$request['password']));
        return response()->json(['mensaje'=>'registro exitoso'],200);

    }
    /*end api que me permita registrar a nuevos administradores*/
    /*start api que me permita sacar la informacion de un solo usuario*/
    public function show($id){
     $user = User::findOrFail($id);
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
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['mensaje'=>'usuario eliminado exitosamente'],200);
    }
    /*end api para actualizar a un usuario*/
    /*start api que me permite ver al usuario segun el numero de cedula*/
    // public function showByIdentificationCard($ic){
    public function showByIdentificationCard($id){
        $user = User::where('identification_card',"=",$id)->get(['id','first_name','last_name','identification_card','email','phone','provenance']);
     return response()->json($user,200);
    }
    /*end api que me permite ver al usuario segun el numero de cedula*/
}
