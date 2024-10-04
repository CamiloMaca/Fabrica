<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    public function index()
    {
        $transaccions=Transaccion::all();

        return response()->json($transaccions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tipo_transaccion_id' => 'required|exists:tipo_transaccions,id',//YYYY-MM-DD
            'fecha' => 'required|date',
            'monto' => 'required|integer',
            'motivo' => 'required|string'
        ]);

        if($request->monto<0){
            return response()->json(['message' => 'El valor del monto es negativo'], 400);
        }
        $transaccion = Transaccion::create($request->all());

        return response()->json($transaccion);
    }

    public function show($id)
    {
        $transaccion = Transaccion::findOrfail($id);

        return response()->json($transaccion);

    }

    public function update(Request $request, Transaccion $transaccion)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id', // Asegúrate de que el usuario exista
            'tipo_transaccion_id' => 'required|exists:tipo_transaccions,id', // Asegúrate de que el tipo de transacción exista
            'fecha' => 'required|date', // Corrige 'reuired' a 'required'
            'monto' => 'required|integer', // Asegúrate de validar que sea un entero
            'motivo' => 'required|string' // Corrige 'requiered' a 'required'
        ]);
    
        if ($request->monto < 0) {
            return response()->json(['message' => 'El valor del monto es negativo'], 400);
        }
    
        // Actualiza la transacción con los datos validados
        $transaccion->update($request->all());
    
        return response()->json($transaccion);
        
    }

    public function destroy(Transaccion $transaccion)
    {
        $transaccion->delete();

        return response()->json($transaccion);

    }
    
}
