<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    public function index()
    {
        //$transaccions=Transaccion::all();
        $transaccions = Transaccion::included()->get();
        
        return response()->json($transaccions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_transaccion_id' => 'required|exists:tipo_transaccions,id',//YYYY-MM-DD
            'fecha' => 'required|date',
            'monto' => 'required|integer',
            'motivo' => 'required|string'
        ]);
        $userId=Auth::id();
        $request['user_id']=$userId;
        
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
            'tipo_transaccion_id' => 'required|exists:tipo_transaccions,id', 
            'fecha' => 'required|date', 
            'monto' => 'required|integer', 
            'motivo' => 'required|string' 
        ]);
        $userId=Auth::id();
        $request['user_id']=$userId;
    
        if ($request->monto < 0) {
            return response()->json(['message' => 'El valor del monto es negativo'], 400);
        }
    
        // Actualiza la transacción con los datos validados
        $transaccion->update($request->all());
    
        return response()->json($transaccion);
        
    }

    public function destroy(Transaccion $transaccion)
    {
        //$transaccion = Transaccion::findOrFiel($id);
        $transaccion->delete();

        return response()->json($transaccion);

    }
    
}
