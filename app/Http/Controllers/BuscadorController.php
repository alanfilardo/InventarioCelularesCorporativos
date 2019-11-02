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
                        $Busqueda = 0;
                        $Clientes = Clientes::orderBy('apellidocliente', 'asc')->paginate(6);
                        return view('index', compact('Clientes', 'Busqueda'));
                        
                        //return redirect()->route('inicio')->with( ['busqueda' => $merchant] );
                    } else {
                        $Busqueda = 1;
                        return view('index', compact('Clientes', 'Busqueda'));
                    }
                    break;
                case 2:
                    $Lineas = Lineas::where('NumeroLinea', 'like', '%'.$request->dato_buscado.'%')->get();
                    if ($Lineas->count() == 0){
                        $Busqueda = 0;
                        $Clientes = Clientes::orderBy('apellidocliente', 'asc')->paginate(6);
                        return view('index', compact('Clientes', 'Busqueda'));
                    } else {
                        $Clientes = collect([]);
                        foreach ($Lineas as $Linea){
                            $Clientes->push($Linea->cliente);  
                        }
                        //SOLO TOMO 6 CLIENTES PARA MOSTRAR PORQUE NO SE PUEDE PAGINAR UNA COLECCION CREADA.
                        $Clientes = $Clientes->take(6);
                        $Busqueda = 1;
                        return view('index', compact('Clientes', "Busqueda"));
                    }
                    
                    break;
                case 3:
                    $Cuenta = Cuentas::where('cuentagmail', 'like', '%'.$request->dato_buscado.'%')
                            ->orwhere('cuentasamsung', 'like', '%'.$request->dato_buscado.'%')
                            ->orwhere('cuentaapple', 'like', '%'.$request->dato_buscado.'%')->first();
                            if ($Cuenta == null){
                                $Busqueda = 0;
                                $Clientes = Clientes::orderBy('apellidocliente', 'asc')->paginate(6);
                                return view('index', compact('Clientes', 'Busqueda'));
                            } else {
                                $Clientes = Clientes::where('id', $Cuenta->clienteid)->paginate(6);
                                if ($Clientes == null){
                                    $Busqueda = 0;
                                    $Clientes = Clientes::orderBy('apellidocliente', 'asc')->paginate(6);
                                    return view('index', compact('Clientes', 'Busqueda'));
                                } else {
                                    $Busqueda=1;
                                    return view('index', compact('Clientes', 'Busqueda'));
                                }
                            }
                    break;
                case 4:
                    $IMEI = Equipos::where('imei', 'like', '%'.$request->dato_buscado.'%')->first();
                    if ($IMEI == null){
                        $Busqueda = 0;
                        $Clientes = Clientes::orderBy('apellidocliente', 'asc')->paginate(6);
                        return view('index', compact('Clientes', 'Busqueda'));
                    } else {
                        $Clientes = Clientes::where('equipoid', $IMEI->id)->paginate(6);
                        if ($Clientes == null){
                            $Busqueda = 0;
                            $Clientes = Clientes::orderBy('apellidocliente', 'asc')->paginate(6);
                            return view('index', compact('Clientes', 'Busqueda'));
                        } else {
                            $Busqueda=1;
                            return view('index', compact('Clientes', 'Busqueda'));
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
