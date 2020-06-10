<?php

namespace App\Http\Controllers;

use App\Action;
use App\Bitacore;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BitacoreController extends Controller
{
	//start api para mostrar las bitacoras segun el id del usuario
    public function showBitacoreByUserId($id){
    $bit = new Bitacore();
    $bit =$bit->showBitacore($id);
    return response()->json($bit,200);
    }
    //end api para mostrar las bitacoras segun el id del usuario
	public function store($user_id,$details,$action_id){
		Bitacore::create([
		'user_id' => $user_id,
		'input' => Carbon::now(),
		'details' => $details,
		'action_id' => $action_id
		]);
		return response()->json(['mensaje'=>'Registro exitoso'],200);
	}
	public function storeBitacoreViewVisits(Request $request){
		$this->store($request->user_id,$request->details,$request->action_id);
		return response()->json(['mensaje'=>'Registro exitoso'],200);
	}
	public function searchBitacore($id,$dato){
	$data = Bitacore::leftJoin('users',"bitacores.user_id","=","users.id")
			->join("actions","bitacores.action_id","=","actions.id")
            ->action($dato,$id)
            ->select('input','action','details')
            ->orderBy('bitacores.id', 'desc')
            ->paginate(30);
    if(!$data[0]){
    	$data = Bitacore::leftJoin('users',"bitacores.user_id","=","users.id")
			->join("actions","bitacores.action_id","=","actions.id")
            ->details($dato,$id)
            ->select('input','action','details')
            ->orderBy('bitacores.id', 'desc')
            ->paginate(30);
    }
    if(!$data[0]){
    	$data = Bitacore::leftJoin('users',"bitacores.user_id","=","users.id")
			->join("actions","bitacores.action_id","=","actions.id")
            ->input($dato,$id)
            ->select('input','action','details')
            ->orderBy('bitacores.id', 'desc')
            ->paginate(30);
    }
	return response()->json($data,200);
	}
}
