<?php

namespace App\Http\Controllers;

use App\Direction;
use App\Floor;
use App\Zone;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
     /*start ver todas los pisos disponibles*/
    public function viewFloors(){
    $floor=Floor::get(['id','floor']);
    return response()->json($floor,200);
    }
    /*end ver los pisos disponibles*/
    /*start api que me perite sacar la zona y el sector solo con el id de el piso*/
    public function viewZonesAndSectors(Request $request){
    $dir= Direction::viewZonesAndSectors($request->id);
    return response()->json($dir,200);
    }
    /*ends api que me perite sacar la zona y el sector solo con el id de el piso*/
 /*start ver todas las zonas disponibles*/
    public function viewZones(Request $request){/*esta mal*/
    return response()->json('todo bien',200);
    }
    /*end ver las zonas disponibles*/
    /*start ver todas los sectores segun su zona*/
    public function viewSectors(Request $request){/*esta mal*/
        $sector =new Direction ();
        return $sector->sectorOfZoneFloor($request->idFloor,$request->idZone);
    // $sectors=Zone::find($request->id)->sectors()->get(['sector']);
    // return response()->json($sectors,200);
    }
    /*end ver todas los sectores segun su zona*/
    /*start sacar el id de la direction*/
    public function directionId(Request $request){
        $direction=Direction::where([['floor_id',$request->idFloor],['zone_id',$request->idZone],['sector_id',$request->idSector]])->select('id')->get();
        return $direction;
    }
    /*start sacar el id de la direction*/
    /*start metodo que me permite cambiar el estado de la pendencia de disponible a no disponible*/
    public function changeStateDependence(Request $request){
        $dir = Direction::findOrFail($request->id);
        $dir->dependence=!$dir->dependence;
        $dir->save();
        return response()->json('actualizado correctamente',200);
    }
    /*end metodo que me permite cambiar el estado de la pendencia de disponible a no disponible*/
    /*start metodo que me permite ver el estado de las dependencias*/
    public function stateDependence(Request $request){
        $direction = Direction::where([['floor_id',$request->idFloor],['zone_id',$request->idZone],['sector_id',$request->idSector]])->select('dependence')->get();
        return response()->json($direction,200);
    }
    /*end metodo que me permite cambiar el estado de la pendencia de disponible a no disponible*/
}
