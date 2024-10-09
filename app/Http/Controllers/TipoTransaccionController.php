<?php

namespace App\Http\Controllers;

use App\Models\TipoTransaccion;
use Illuminate\Http\Request;

class TipoTransaccionController extends Controller
{
    public function index()
    {
        $tipoTransaccion=TipoTransaccion::all();
        //$tipoTransaccion = TipoTransaccion::included()->get();
    
        return response()->json($tipoTransaccion);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'TipoTransaccion'=>'required|max:100',
        ]);

        $tipoTransaccion = TipoTransaccion::create($request->all());

        return response()->json($tipoTransaccion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoTransaccion  
     * @return \Illuminate\Http\Response
     */
    public function show($id) //si se pasa $id se utiliza la comentada
    {  
        $tipoTransaccion = TipoTransaccion::included()->findOrFail($id);
        return response()->json($tipoTransaccion);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoTransaccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoTransaccion $tipoTransaccion)
    {
        $request->validate([
     'TipoTransaccion'=>'required|max:100',
        ]);

        $tipoTransaccion->update($request->all());

        return response()->json($tipoTransaccion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoTransaccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoTransaccion $tipoTransaccion)
    {
        $tipoTransaccion->delete();
        return response()->json($tipoTransaccion);
    }
}
