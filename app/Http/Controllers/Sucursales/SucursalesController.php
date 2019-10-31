<?php

namespace App\Http\Controllers\Sucursales;
use App\Models\Paises;
use App\Models\Provincias;
use App\Models\Sucursales;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SucursalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursales = Sucursales::orderBy('NombreSucursal', 'asc')->paginate(5);
        return view('Sucursales.index', compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincias = Provincias::orderBy('NombreProvincia', 'asc')->get();
        return view('Sucursales.crear',compact('provincias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Sucursales = new Sucursales(['NombreSucursal' => $request->NombreSucursal, 'Provincia_id' => $request->ProvinciaId]);
        $Sucursales->save();
        return redirect()->route('sucursales');
    }

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
        $sucursal = Sucursales::findorFail($id);
        $Provincias = Provincias::all();
        $provincia = Provincias::findorFail($sucursal->Provincia_id);
        return view('Sucursales.editar', compact('sucursal', 'provincia', 'Provincias'));


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
        Sucursales::where('id', $id)->update(["NombreSucursal" => $request->NombreSucursal, "Provincia_id" => $request->ProvinciaId]);
        return redirect()->route('sucursales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sucursales::findorFail($id)->delete();
        return redirect()->route('sucursales');
    }
}
