<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\User;
use App\Visitor;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
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
