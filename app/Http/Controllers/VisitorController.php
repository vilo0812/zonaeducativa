<?php

namespace App\Http\Controllers;

use App\Direction;
use App\Handling_time;
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
    public function store(Request $request)
    {
        // $time=Carbon::now()->format('h:i');
        $time=Carbon::now();
        $direccion = Direction::where([['floor_id',$request->idFloor],['zone_id',$request->idZone],['sector_id',$request->idSector]])->select('id')->get();
        $user=User::create([
            'first_name'=>$request['first_name'],
            'last_name'=>$request['last_name'],
            'identification_card'=>$request['identification_card'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'rol_id'=>3
        ]);
        $time=Handling_time::create([
            'input'=>Carbon::now()
        ]);
        $visit=Visitor::create([
        'user_id'=>$user->id,
        'handling_time_id'=>$time->id,
        'ticket_id'=>$request->ticket_id,
        'direction_id'=>$direccion[0]->id,
        'belongings'=>$request->belogings,
        'observation'=>$request->observation,
        ]);
        // $info=[
        // $request['first_name'],
        // $request['last_name'],
        // $request['identification_card'],
        // $request['email'],
        // $request['phone'],
        // $time->id,
        // $user->id,
        // $request->ticket_id,
        // $direccion[0]->id,
        // $request->belogings,
        // $request->observation,
        // ];
         return response()->json(['mensaje'=>'Registro exitoso'],200);
    }
    /*end iniciamos la api que permite registrar visitas*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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
    public function update(Request $request, $id)
    {
        //
    }

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
