<?php

namespace App\Http\Controllers;

use App\Direction;
use App\Floor;
use App\Sector;
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
    public function showZonesAndSectors($id){
    $dir= Direction::showZonesAndSectors($id);
    return response()->json($dir,200);
    }
    /*ends api que me perite sacar la zona y el sector solo con el id de el piso*/
    /*start ver todas los sectores segun su zona*/
    public function showSectors($idFloor,$idZone){/*esta mal*/
        $sector =new Direction ();
        return $sector->sectorOfZoneFloor($idFloor,$idZone);
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
    public function stateDependence($idFloor,$idZone,$idSector){
        $direction = Direction::where([['floor_id',$idFloor],['zone_id',$idZone],['sector_id',$idSector]])->select('dependence')->get();
        return response()->json($direction,200);
    }
    /*end metodo que me permite cambiar el estado de la pendencia de disponible a no disponible*/
    //start api para ver todos los sectores
    public function viewSectors(){
        $sector = Sector::get(['id','sector']);
        return response()->json($sector,200);
    }
}
