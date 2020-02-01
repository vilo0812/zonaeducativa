<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
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
        /*start login personalizado*/
        if (Auth::attempt(['email' => $request->email, 'password' => $request->clave], false)) {
            // Session::put('email', $request->email);
            $correo= Session('email');//iniciamos la sesión
             return response()->json('has iniciado sesión'.$correo, 200);
            }else{
            return response()->json(['errors'=>['loginEmail'=>['El correo o la contraseña es invalida']]],422);
            }
            /*end login personalizado*/
    }
    /*end api para iniciar sesión*/
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
