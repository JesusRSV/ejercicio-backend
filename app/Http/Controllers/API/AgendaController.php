<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Agenda;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenda = Agenda::all();

        return response()->json([
            'agendas'           => $agenda,
            'response'          => true
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre'                =>  'required',
            'email'                 =>  'required',
            'apellido'              =>  'required',
            'telefono'              =>  'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
                'response'    =>  false
            ]);
        }

        $registro = Agenda::create($request->all());

        return response()->json([
            'registro'      => $registro,
            'response'      =>  true
        ], 200);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registro = Agenda::find($id);

        if(!empty($registro)){
            return response()->json([
                'registro'      => $registro,
                'response'      =>  true
            ], 200);
        }else{
            return response()->json([
                'response'      =>  false
            ], 404);
        }
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
        $registro = Agenda::find($id);
        $registro->update($request->all());

        if(!empty($registro)){
            return response()->json([
                'registro'      => $registro,
                'response'      =>  true
            ], 200);
        }else{
            return response()->json([
                'response'      =>  false
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = Agenda::find($id);

        $registro->delete();

        return response()->json([
            'response'       => true,
        ], 200);
    }
}
