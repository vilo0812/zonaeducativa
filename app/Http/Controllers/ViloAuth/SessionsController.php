<?php
namespace App\Http\Controllers\ViloAuth;//llama
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;
class SessionsController extends Controller
{

    public function iniciarSesion(LoginFormRequest $request){
    	/*start login personalizado*/
        if (Auth::attempt(['email' => $request->email, 'password' => $request->clave], false)) {
            // Session::put('email', $request->email);
            $correo= Session('email');
            /*start en el if validamos si el usuario es el dueño de la contraseña e inicia la sesion*/
             return response()->json('has iniciado sesión'.$correo, 200);
	    	/*end en el if validamos si el usuario es el dueño de la contraseña e inicia la sesion*/
	    	}else if(!User::all()->where('email',$request->email)->count()){/*start validamos que se encuentre en la base de datos y lanzamos un error si no se encuentra*/
            return response()->json(['errors'=>['loginEmail'=>['El correo electrónico es incorrecto']]],422);
            /*end validamos que se encuentre en la base de datos y lanzamos un error si no se encuentra*/
            }else{
	    	return response()->json(['errors'=>['loginClave'=>['La contraseña es incorrecta']]],422);
            }
	    	/*end login personalizado*/
    }
    public function rol(){
        return response()->json('deberias ser un super admin',200);
    }
    public function cerrarSesion(Request $request){
        // Auth::logout();
        $correo = Auth::user()->email;
        return response()->json($correo,200);
    }
}
