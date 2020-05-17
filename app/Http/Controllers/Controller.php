<?php

namespace App\Http\Controllers;

use App\Direction;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RecoverPasswordRequest;
use App\Password_recover;
use App\User;
use App\Visitor;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /*start api que lanza el SPA*/
    public function index(){
    	return view('app');
    }
    /*end api que lanza el SPA*/
    /*start api para iniciar sesión*/
    public function login(LoginFormRequest $request){
        $credentials = request(['email', 'password']);
        /*start login personalizado*/
        if (!$token = auth('api')->attempt($credentials)) {
        return response()->json(['error' => ['loginEmail'=>['El correo o la contraseña es invalida']]], 401);//disparamos un error por si acaso el usuario se equivoca
        }else{
        return $this->respondWithToken($token);//llamamos a una funcion que arma todo lo que yo necesito en mi sesion :3
        }
        /*end login personalizado*/
    }
    /*end api para iniciar sesión*/
    /*start funcion que me crea los datos que van para la sesion*/
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'user' => $this->guard()->user(),
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
    /*end funcion que me crea los datos que van para la sesion*/
    /*start funcion que me trae los datos del usuario*/
    public function guard(){
        return \Auth::Guard('api');
    }
    /*end funcion que me trae los datos del usuario*/
    /*start funcion para generar un codigo aleatorio*/
    public function token($longitud) {
         $key = '';
         $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
         $max = strlen($pattern)-1;
         for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
         return $key;
        }
        /*end funcion para generar un codigo aleatorio*/
     /*start funcion que me permite recuperar la contraseña enviando un codigo a mi correo que me para verificar*/
    public function recoverPassword(RecoverPasswordRequest $request){
        if(User::where('email',request('email'))->count()){
            if(Password_recover::where('email',request('email'))->count()){
            $id = Password_recover::where('email',request('email'))->get('id');
            $pas = Password_recover::find($id[0]->id);
            $pas->token = $this->token(6);
            $pas->save();
            // Mail::to(request('email'))->send(new UsuarioRegistrado($request['first_name'],$request['last_name'],$request['identification_card'],$request['email'],$request['phone'],$request['password']));
            return response()->json(['mensaje'=>'codigo enviado correctamente'], 200);
            }else{
            $pas = Password_recover::create(['email'=>request('email'),'token'=>$this->token(6)]);
            // Mail::to(request('email'))->send(new UsuarioRegistrado($request['first_name'],$request['last_name'],$request['identification_card'],$request['email'],$request['phone'],$request['password']));
            return response()->json(['mensaje'=>'codigo enviado correctamente'], 200);
            }
        }else{
            return response()->json(['mensaje'=>['emailWrong' => ['el correo ingresado es incorrecto']]], 422);
        }
        // $pas = Password_reset::create(request('email'),'token'=>'1234']);
        // return request('email');
    }
    /*end funcion que me permite recuperar la contraseña enviando un codigo a mi correo que me para verificar*/
    /*start revisamos si el codigo es correcto*/
    public function code(Request $request){
        if(Password_recover::where([["token",$request->token],["email",$request->email]])->count()){
            return response()->json(['mensaje'=>'verificado correctamente'], 200);
        }else{
        return response()->json(['mensaje'=>['token' => ['el token ingresado es incorrecto']]], 422);
        }
    }
    /*end revisamos si el codigo es correcto*/
    /*start api que cambia la contraseña del usuario*/
    public function newPassword(Request $request){
        $id = User::whereEmail($request->email)->get('id');
        $user = User::find($id[0]->id);
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json(['mensaje'=>'contraseña cambiada correctamente'], 200);
    }
    /*end api que cambia la contraseña del usuario*/
    /*api que me permite visualizar los pdfs*/
    public function showVisitsPdf(){
    	$data=Visitor::showVisitsPdf();
    	$pdf = App::make('dompdf.wrapper');
        $pdf->setPaper('a4', 'landscape');
    	$pdf->loadView('pdf.showVisits',compact('data'));

    	return $pdf->stream();
    }
    /*end que me permite visualizar los pdfs*/
    /*start api que me permtie descargar los pdfs*/
    public function downloadPdf(){
    	$data=Visitor::showVisitsPdf();
    	$pdf = App::make('dompdf.wrapper');
        $pdf->setPaper('a4', 'landscape');
    	$pdf->loadView('pdf.showVisits',compact('data'));
    	return $pdf->download();
    }
    /*end api que me permtie descargar los pdfs*/
    
}
