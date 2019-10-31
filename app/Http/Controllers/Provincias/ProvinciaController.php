<?php

namespace App\Http\Controllers\Provincias;
use App\Models\Provincias;
use App\Models\Paises;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provincias = Provincias::orderBy('NombreProvincia', 'asc')->paginate(5);
        return view('Provincias.index', compact('provincias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Paises::orderBy('NombrePais', 'asc')->get();
        return view('Provincias.crear',compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Provincias = new Provincias(['NombreProvincia' => $request->NombreProvincia, 'Pais_id' => $request->NombrePais]);
        $Provincias->save();
        return redirect()->route('provincias');
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
        $ProvinciaSeleccionada = Provincias::findorfail($id);
        $PaisSeleccionado = $ProvinciaSeleccionada->paises;
        $Paises = Paises::orderBy('NombrePais', 'asc')->get();
        return view('Provincias.editar', compact('ProvinciaSeleccionada', 'PaisSeleccionado', 'Paises'));
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
        Provincias::where('id', $id)->update(["NombreProvincia" => $request->NombreProvincia, "Pais_id" => $request->selectPaises]);
        return redirect()->route('provincias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Provincias::findorFail($id)->delete();
        return redirect()->route('provincias');
    }
}
