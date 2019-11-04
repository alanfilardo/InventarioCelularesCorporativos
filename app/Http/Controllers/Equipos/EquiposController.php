<?php

namespace App\Http\Controllers\Equipos;

use App\Http\Controllers\Controller;
use App\Models\Equipos;
use App\Models\MarcasEquipos;
use App\Models\ModelosEquipos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexEquipos()
    {
        $equipos = Equipos::orderBy('imei', 'asc')->paginate(5);
        return view('Equipos.index', compact('equipos'));
    }

    public function stockEquipos()
    {
        $equipos = Equipos::where('Asignado', 0)->paginate(5);
        return view('Equipos.index', compact('equipos'));
    }

    public function indexMarcas()
    {
        $marcas = MarcasEquipos::orderBy('NombreMarca', 'asc')->paginate(5);
        return view('Equipos.indexMarcas', compact('marcas'));
    }

    
    public function indexModelos()
    {
        $modelos = ModelosEquipos::orderBy('ModeloEquipo', 'asc')->paginate(5);
        return view('Equipos.indexModelos', compact('modelos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createModelos()
    {
        $marcas = MarcasEquipos::orderBy('NombreMarca', 'asc')->get();
        return view ('Equipos.crearModelo', compact('marcas'));
    }

    public function createMarcas()
    {
        return view ('Equipos.crearMarca');
    }

    public function createEquipos()
    {
        $marcas = MarcasEquipos::orderBy('NombreMarca', 'asc')->get();
        $modelos = ModelosEquipos::orderBy('ModeloEquipo', 'asc')->get();
        return view ('Equipos.crearEquipo', compact('marcas', 'modelos'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMarcas(Request $request)
    {
        $MarcaInsertar = new MarcasEquipos($request->all());
        $MarcaInsertar->save();
        return redirect()->route('marcas');
    }

    public function storeModelos(Request $request)
    {
        $Modelo = new ModelosEquipos(["MarcaEquipo_id" => $request->NombreMarca, "ModeloEquipo" => $request->NombreModelo]);
        $Modelo->save();
        return redirect()->route('modelos');
        
    }

    public function storeEquipos(Request $request)
    {
        $Equipo = new Equipos(["imei" => $request->imei, "ModeloEquipo_id" => $request->NombreModelo]);
        $Equipo->save();
        return redirect()->route('equipos');
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
    public function editMarca($id)
    {
        $Marca = MarcasEquipos::findorFail($id);
        return view("Equipos.editarMarca", compact('Marca'));
    }

    public function editModelo($id)
    {
        $Modelo = ModelosEquipos::findorFail($id);
        $Marcas = MarcasEquipos::all();
        return view("Equipos.editarModelo", compact('Modelo', 'Marcas'));
    }

    public function editEquipo($id)
    {
        $Equipo = Equipos::findorFail($id);
        $Marcas = MarcasEquipos::all();
        $Modelos = ModelosEquipos::all();
        return view("Equipos.editar", compact('Modelos', 'Marcas', 'Equipo'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMarca(Request $request, $id)
    {
        MarcasEquipos::where('id', $id)->update(["NombreMarca" => $request->NombreMarca]);
        return redirect()->route('marcas');
    }

    public function updateModelo(Request $request, $id)
    {
        ModelosEquipos::where('id', $id)->update(["ModeloEquipo" => $request->NombreModelo]);
        return redirect()->route('modelos');
    }

    public function updateEquipo(Request $request, $id)
    {
        Equipos::where('id', $id)->update(["imei" => $request->imei, "ModeloEquipo_id" => $request->NombreModelo]);
        return redirect()->route('equipos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMarca($id)
    {
        MarcasEquipos::where('id', $id)->delete();
        return redirect()->route('marcas');
    }

    public function destroyModelo($id)
    {
        ModelosEquipos::where('id', $id)->delete();
        return redirect()->route('modelos');
    }

    public function destroyEquipo($id)
    {
        Equipos::where('id', $id)->delete();
        return redirect()->route('equipos');
    }
}
