<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clientes;
use App\Models\Cuentas;
use App\Models\Equipos;
use App\Models\Lineas;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuscadorController extends Controller
{
    public function buscarcliente(Request $request){
        if ($request->dato_buscado){
            
            switch ($request->tipobusqueda) {
                case 1:
                    $Clientes = Clientes::where('nombrecliente','like', '%'.$request->dato_buscado.'%')
                                        ->orwhere('apellidocliente','like', '%'.$request->dato_buscado.'%')
                                        ->paginate(6);

                    if ($Clientes->isEmpty()){
                        return redirect()->route('inicio');
                    } else {
                        return view('index', compact('Clientes'));
                    }
                    break;
                case 2:
                    $Lineas = Lineas::where('NumeroLinea', 'like', '%'.$request->dato_buscado.'%')->first();
                    if ($Lineas == null){
                        return redirect()->route('inicio');
                    } else {
                        $Clientes = Clientes::where('lineaid', $Lineas->id)->paginate(6);
                        if ($Clientes == null){
                            return redirect()->route('inicio');
                        } else {
                            return view('index', compact('Clientes'));
                        }
                    }
                    
                    break;
                case 3:
                    $Cuenta = Cuentas::where('cuentagmail', 'like', '%'.$request->dato_buscado.'%')
                            ->orwhere('cuentasamsung', 'like', '%'.$request->dato_buscado.'%')
                            ->orwhere('cuentaapple', 'like', '%'.$request->dato_buscado.'%')->first();
                            if ($Cuenta == null){
                                return redirect()->route('inicio');
                            } else {
                                $Clientes = Clientes::where('id', $Cuenta->clienteid)->paginate(6);
                                if ($Clientes == null){
                                    return redirect()->route('inicio');
                                } else {
                                    return view('index', compact('Clientes'));
                                }
                            }
                    break;
                case 4:
                    $IMEI = Equipos::where('imei', 'like', '%'.$request->dato_buscado.'%')->first();
                    if ($IMEI == null){
                        return redirect()->route('inicio');
                    } else {
                        $Clientes = Clientes::where('equipoid', $IMEI->id)->paginate(6);
                        if ($Clientes == null){
                            return redirect()->route('inicio');
                        } else {
                            return view('index', compact('Clientes'));
                        }
                    }
                    break;
            }

        } else{
            return redirect()->route('inicio');
        }
//        return view('index', compact('Clientes'));
    }
}
