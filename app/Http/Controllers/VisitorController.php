<?php

namespace App\Http\Controllers;

use App\Direction;
use App\Handling_time;
use App\Http\Requests\RegisterVisitorRequest;
use App\User;
use App\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*start iniciamos la api que permite registrar visitas*/
    public function store(RegisterVisitorRequest $request)
    {
        // $time=Carbon::now()->format('h:i');
        $time=Carbon::now();
        $direccion = Direction::where([['floor_id',$request->idFloor],['zone_id',$request->idZone],['sector_id',$request->idSector]])->select('id')->get();
        if(!$request['id']){
        $user=User::create([
            'first_name'=>$request['first_name'],
            'last_name'=>$request['last_name'],
            'identification_card'=>$request['identification_card'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'rol_id'=>3
        ]);
        $id=$user->id;
        }else{
        $id=$request['id'];
        }
        $time=Handling_time::create([
            'input'=>Carbon::now()
        ]);
        $visit=Visitor::create([
        'user_id'=>$id,
        'handling_time_id'=>$time->id,
        'ticket_id'=>$request->ticket_id,
        'direction_id'=>$direccion[0]->id,
        'provenance'=>$request['provenance'],
        'belongings'=>$request->belogings,
        'observation'=>$request->observation,
        ]);
         return response()->json(['mensaje'=>'Registro exitoso'],200);
    }
    /*end iniciamos la api que permite registrar visitas*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // start paginacion de los registros para el reporte
    public function showPageVisits()
    {
        return response()->json(Visitor::showPageVisits(),200);
    }
    // end paginacion de los registros para el reporte
    /*start api que me permite ver los registros inmediatos de todas las visitas*/
    public function show()
    {
        return response()->json(Visitor::showVisits(),200);
    }
    /*end api que me permite ver los registros inmediatos de todas las visitas*/
    /*start api que me permite ver las visitas que no han sido marcadas en un lapso de 2 semanas*/
    public function showOnlyNotTargetVisits(){
        return response()->json(Visitor::showOnlyNotTargetVisits(),200);
    }
    /*end api que me permite ver las visitas que no han sido marcadas en un lapso de 2 semanas*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*start api que me permite actualizar las visitas marcando su hora de salida*/
    public function update(Request $request)
    {
        $visit = Visitor::findOrFail($request->id);
        $visit=$visit->handling_time;
        $visit->output=Carbon::now();
        $visit->save();
        return response()->json('actualizado con exito',200);;
    }
    /*end api que me permite actualizar las visitas marcando su hora de salida*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
