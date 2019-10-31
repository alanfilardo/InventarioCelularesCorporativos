<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Lineas;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuscadorController extends Controller
{
    public function buscarcliente(Request $request){
        $CompruebaDato = Is_numeric($request->Buscador);
        if ($CompruebaDato){
            $Lineas = Lineas::where('NumeroLinea', 'like', $request->Buscador.'%')->get();
            $Clientes = Clientes::where('lineaid', 'like', $Lineas->id.'%')->paginate(6);
            return view('index', compact('Clientes'));
        } else {
            $Clientes = Clientes::where('nombrecliente', 'like', $request->Buscador.'%')->orwhere('apellidocliente', 'like', $request->Buscador.'%')->paginate(6);
            return view('index', compact('Clientes'));
        }

    }
}
