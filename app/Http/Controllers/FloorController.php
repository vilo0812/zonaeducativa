<?php

namespace App\Http\Controllers;

use App\Floor;
use App\Handling_floor;
use App\Zone;
use Illuminate\Http\Request;

class FloorController extends Controller
{
     /*start ver todas los pisos disponibles*/
    public function viewFloors(){
    $floor=Floor::get(['id','floor']);
    return response()->json($floor,200);
    }
    /*end ver los pisos disponibles*/
 /*start ver todas las zonas disponibles*/
    public function viewZones(Request $request){
    $pisos=Handling_floor::all()->where('floor_id',$request->id);
    return response()->json($pisos,200);
    }
    /*end ver las zonas disponibles*/
    /*start ver todas los sectores segun su zona*/
    public function viewSectors(Request $request){
    $sectors=Zone::find($request->id)->sectors()->get(['sector']);
    return response()->json($sectors,200);
    }
    /*end ver todas los sectores segun su zona*/
}
