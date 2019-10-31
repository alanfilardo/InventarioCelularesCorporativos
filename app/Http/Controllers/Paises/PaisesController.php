<?php

namespace App\Http\Controllers\Paises;

use App\Http\Controllers\Controller;
use App\Models\Paises;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = Paises::orderBy('NombrePais', 'asc')->paginate(5);
        //$paises = Paises::orderBy('NombrePais', 'asc')->get();
        return view('Paises.index', compact('paises'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Paises.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $PaisInsertar = new Paises($request->all());
        $PaisInsertar->save();
        return redirect()->route('paises');
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
        $Pais = Paises::findorFail($id);
        return view('Paises.editar', compact('Pais'));
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
        Paises::where('id',$id)->update(["NombrePais" => $request->NombrePais]);
        return redirect()->route('paises');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paises::findorFail($id)->delete();
        return redirect()->route('paises');
    }
}
