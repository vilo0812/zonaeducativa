<?php

namespace App\Http\Controllers;
use App\Bitacore;
use App\Http\Requests\RegisterAdminRequest;
use App\Mail\UsuarioRegistrado;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Mail;
class UserController extends Controller
{
    // start api para ver a los admins y jefes de zona
    public function viewUsers(){
    $users=$users=User::where('rol_id',2)
    ->orWhere('rol_id',3)
    ->select(['id','first_name','identification_card','phone','email','rol_id'])
    ->paginate(30);
    return response()->json($users,200);
    }
    /*start api que permita visualizar a los administradores trayendo solo el id y el nombre*/
    public function viewAdmins(){
        /*start sacamos solo a los usuarios administradores y los mandamos a la vista*/
    $admins=User::where('rol_id',2)->get(['id','first_name']);
    return response()->json(['admins'=>$admins],200);
        /*end sacamos solo a los usuarios administradores y los mandamos a la vista*/
    }
    /*end api que permita visualizar a los administradores trayendo solo el id y el nombre*/
    /*start api que permite ver a los Jefes de Zona*/
    public function viewLeadersZone(){
        /*start sacamos solo a los usuarios administradores y los mandamos a la vista*/
    $admins=User::where('rol_id',4)->get();
    return response()->json($admins,200);
        /*end sacamos solo a los usuarios administradores y los mandamos a la vista*/
    }
    /*end api que permite ver a los Jefes de Zona*/
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
    /*start api que me permita registrar a un Jefe de Zona*/
    public function storeLeaderZone(RegisterAdminRequest $request){
        if(User::where('identification_card',$request['identification_card'])->count()){
            $user = User::where('identification_card',$request['identification_card'])->get();
            $user[0]->rol_id = 4;
            $user[0]->save();
            Mail::to($request['email'])
            ->send(new UsuarioRegistrado(
                $request['first_name'],
                $request['last_name'],
                $request['identification_card'],
                $request['email'],
                $request['phone'],
                $request['password'],
                4
            ));
            return response()->json(['mensaje'=>'registro exitoso'],200);
        }
        User::create([
            'first_name'=>$request['first_name'],
            'last_name'=>$request['last_name'],
            'identification_card'=>$request['identification_card'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'password'=>bcrypt($request['password']),
            'rol_id'=>4
        ]);
     Mail::to($request['email'])
            ->send(new UsuarioRegistrado(
                $request['first_name'],
                $request['last_name'],
                $request['identification_card'],
                $request['email'],
                $request['phone'],
                $request['password'],
                4
            ));
        return response()->json(['mensaje'=>'registro exitoso'],200);
    }
    /*end api que me permita registrar a un Jefe de Zona*/
    /*start api que me permita registrar a un administrador*/
    public function storeAdmin(RegisterAdminRequest $request){
        if(User::where('identification_card',$request['identification_card'])->count()){
            $user = User::where('identification_card',$request['identification_card'])->get();
            $user[0]->rol_id = 2;
            $user[0]->save();
            Mail::to($request['email'])
            ->send(new UsuarioRegistrado(
                $request['first_name'],
                $request['last_name'],
                $request['identification_card'],
                $request['email'],
                $request['phone'],
                $request['password'],
                2
            ));
            return response()->json(['mensaje'=>'registro exitoso'],200);
        }
        User::create([
            'first_name'=>$request['first_name'],
            'last_name'=>$request['last_name'],
            'identification_card'=>$request['identification_card'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'password'=>bcrypt($request['password']),
            'rol_id'=>2
        ]);
    Mail::to($request['email'])
    ->send(new UsuarioRegistrado(
        $request['first_name'],
        $request['last_name'],
        $request['identification_card'],
        $request['email'],
        $request['phone'],
        $request['password'],
        2
    ));
    return response()->json(['mensaje'=>'registro exitoso'],200);

    }
    /*end api que me permita registrar a un administrador*/
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
        $bitacore = new BitacoreController();
        $bitacore->store($request->user_id,$request->details,$request->action_id);
        return response()->json(['mensaje'=>'actualización exitosa'],200);
    }
    /*end api para actualizar a un usuario*/
    /*start api para actualizar a un usuario*/
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->rol_id = 3;
        $user->save();
        return response()->json(['mensaje'=>'usuario eliminado exitosamente'],200);
    }
    /*end api para actualizar a un usuario*/
    /*start api que me permite ver al usuario segun el numero de cedula*/
    // public function showByIdentificationCard($ic){
    public function showByIdentificationCard($id){
        $user = User::where('identification_card',"=",$id)->get(['id','first_name','last_name','identification_card','email','phone']);
     return response()->json($user,200);
    }
    /*end api que me permite ver al usuario segun el numero de cedula*/
    // start ver la bitacora del usuario en PDF
    public function viewBitacore($id){
    $bit = new Bitacore();
    $bit =$bit->showBitacore($id);
    $user = User::findOrFail($id);
    $pdf = App::make('dompdf.wrapper');
    $pdf->setPaper('a4','landscape');
    $pdf->loadView('pdf.bitacore',compact('bit','user'));
    return $pdf->stream();
    }
    // end ver la bitacora del usuario en PDF
    // start descargar bitacora del usuario
    public function DownloadBitacore($id){
    $bit = new Bitacore();
    $bit =$bit->showBitacore($id);
    $user = User::findOrFail($id);
    $pdf = App::make('dompdf.wrapper');
    $pdf->setPaper('a4','landscape');
    $pdf->loadView('pdf.bitacore',compact('bit','user'));
    return $pdf->download();
    }
    // start descargar bitacora del usuario
    //start api para buscar usuarios
    public function searchUser($dato){
    $data = User::firstname($dato)
            ->orderBy('id', 'desc')
            ->paginate(30);
    if(!$data[0]){
     $data = User::lastname($dato)
            ->orderBy('id', 'desc')
            ->paginate(30);
    }
    if(!$data[0]){
     $data = User::identificationcard($dato)
            ->orderBy('id', 'desc')
            ->paginate(30);
    }
    if(!$data[0]){
     $data = User::phone($dato)
            ->orderBy('id', 'desc')
            ->paginate(30);
    }
    if(!$data[0]){
      $data = User::email($dato)
            ->orderBy('id', 'desc')
            ->paginate(30);
    }
    if(!$data[0]){
      $data = User::leftJoin('rols',"users.rol_id","=","rols.id")
            ->rols($dato)
            ->orderBy('users.id', 'desc')
            ->paginate(30);
    }
    return response()->json($data,200);
    }
    //end api para buscar usuarios
    //start agregamos la firma digitales
    public function getSign(Request $request){
        if($archivo=$request->file('image')){
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('images',$nombre);
            $entrada['ruta']=$nombre;
            $user = User::Find($request->id);
            $user->sign = $nombre;
            $user->save();
            return response()->json($nombre, 200);
        }else{
            return "no hay imagen";
        }
    }
    //end agregamos la firma digital

//start eliminamos la firma
    public function destroySign(Request $request){
         $user = User::Find($request->id);
         $img = public_path('images/'.$user->sign);
         if(@getimagesize($img)){
            unlink($img);
            $user->sign = null;
            $user->save();
            return response()->json("Firma Eliminada exitosamente", 200);
         }
         else{
            $user->sign = null;
            $user->save();
            return response()->json("Firma Eliminada exitosamente", 200);
         }
    }
    //end eliminamos la firma
//start eliminamos la firma
    public function updateSign(Request $request){
         $user = User::Find($request->id);
         $img = public_path('images/'.$request->oldSign);
         if(@getimagesize($img)){
            unlink($img);
         }
         if($archivo=$request->file('image')){
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('images',$nombre);
            $entrada['ruta']=$nombre;
            $user->sign = $nombre;
            $user->save();
            return response()->json($nombre, 200);
        }else{
            return "no hay imagen";
        }
         
    }
    //end eliminamos la firma
}
