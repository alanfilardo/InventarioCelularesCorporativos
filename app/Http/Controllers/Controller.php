<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\MarcasEquipos;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index()
    {
        $Busqueda=1;
        $Clientes = Clientes::orderBy('apellidocliente', 'asc')->paginate(6);
        return view('index', compact('Clientes', 'Busqueda'));
    }
}
