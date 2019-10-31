<?php

namespace App\Http\Controllers\Clientes;
use App\Models\Lineas;
use App\Http\Controllers\Controller;
use App\Models\Clientes;
use App\Models\Cuentas;
use App\Models\Equipos;
use App\Models\Sucursales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Clientes = Clientes::orderBy('apellidocliente', 'asc')->paginate(5);
        return view('Clientes.index', compact('Clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Sucursales = Sucursales::orderBy('NombreSucursal', 'asc')->get();
        $Lineas = Lineas::where('Asignado', 0)->orderBy('NumeroLinea', 'asc')->get();
        $Equipos = Equipos::where('Asignado', 0)->orderBy('imei', 'asc')->get();
        return view('Clientes.crear', compact('Lineas', 'Equipos', 'Sucursales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Cliente = new Clientes([
            "nombrecliente" => $request->NombreCliente,
            "apellidocliente" => $request->ApellidoCliente,
            "lineaid" => $request->LineaCliente,
            "equipoid" => $request->EquipoCliente,
            "sucursalid" => $request->SucursalCliente
            ]);

            $Cliente->save();

            $idCliente = Clientes::where('lineaid', $request->LineaCliente)->get('id');
            $idCliente = $idCliente[0]->id;
           // echo $idCliente;

        $Cuentas = new Cuentas([
            "clienteid" => $idCliente,
            "cuentagmail" => $request->GmailCliente,
            "passwordgmail" => $request->GmailPassword,
            "cuentasamsung" => $request->SamsungCliente,
            "passwordsamsung" => $request->SamsungPassword,
            "cuentaapple" => $request->AppleCliente,
            "passwordapple" => $request->ApplePassword
            ]);


        $Cuentas->save();

        Equipos::find($request->EquipoCliente)->update(['Asignado' => true]);
        Lineas::find($request->LineaCliente)->update(['Asignado' => true]);
        return redirect()->route('clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Cliente = Clientes::findorfail($id);
        $Sucursales = Sucursales::orderby('NombreSucursal', 'asc')->get();
        $Lineas = Lineas::orderby('NumeroLinea', 'asc')->get();
        $Equipos = Equipos::orderby('imei', 'asc')->get();
        return view ('Clientes.ver', compact('Cliente', 'Sucursales', 'Lineas', 'Equipos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Cliente = Clientes::findorfail($id);
        $Sucursales = Sucursales::orderBy('NombreSucursal', 'asc')->get();
        $Lineas = Lineas::where('Asignado', 0)->orderBy('NumeroLinea', 'asc')->get();
        $Equipos = Equipos::where('Asignado', 0)->orderBy('imei', 'asc')->get();
        return view('Clientes.editar', compact('Cliente', 'Sucursales', 'Lineas', 'Equipos'));
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
        $Cliente = Clientes::findorfail($id);
        $EquipoAnterior = ($Cliente->equipo)->id;
        $LineaAnterior = ($Cliente->linea)->id;
        Equipos::findorfail($EquipoAnterior)->update(["Asignado" => 0]);
        Lineas::findorfail($LineaAnterior)->update(["Asignado" => 0]);
        echo $request->LineaCliente;
        echo $request->EquipoCliente;
     
        Clientes::where('id', $id)->update([
            "nombrecliente" => $request->NombreCliente,
            "apellidocliente" => $request->ApellidoCliente,
            "lineaid" => $request->LineaCliente,
            "equipoid" => $request->EquipoCliente,
            "sucursalid" => $request->SucursalCliente
        ]);

        Cuentas::where('clienteid', $id)->update([
            "cuentagmail" => $request->GmailCliente,
            "passwordgmail" => $request->GmailPassword,
            "cuentasamsung" => $request->SamsungCliente,
            "passwordsamsung" => $request->SamsungPassword,
            "cuentaapple" => $request->AppleCliente,
            "passwordapple" => $request->ApplePassword
        ]);
        Equipos::findorfail($request->EquipoCliente)->update(["Asignado" => 1]);
        Lineas::findorfail($request->LineaCliente)->update(["Asignado" => 1]);
        return redirect()->route('clientes'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Cliente = Clientes::findorFail($id);
        Lineas::find($Cliente->lineaid)->update(['Asignado' => false]);
        Equipos::find($Cliente->equipoid)->update(['Asignado' => false]);
       $Cliente = Clientes::findorFail($id)->delete();
       return redirect()->route('clientes');
    }
}
