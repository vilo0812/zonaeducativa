<?php

namespace App\Http\Controllers;

use App\Action;
use App\Bitacore;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BitacoreController extends Controller
{
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
}
