@extends('layouts.base')

@section('Titulo')
    Equipos
@endsection

@section('ApartadoTitulo')
    Listado de Equipos
@endsection

@section('Contenido')
<div class="contenedor-agregar">
    <a class="btn btn-success boton-agregar" href="{{route('crear_equipo')}}" style="float: right;"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
    </div>
<table class="table table-sm text-center table-hover">
        <thead>
              <tr>
                <th colspan="2" scope="col">Marca</th>
                <th colspan="2" scope="col">Modelo</th>
                <th colspan="2" scope="col">IMEI</th>
                <th colspan="2" scope="col">Estado</th>
                <th colspan="2" scope="col">Editar</th>
                <th colspan="2" scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>

@foreach ($equipos as $equipo)
<tr>
        <td colspan="2">{{ (($equipo->modelos)->marcas)->NombreMarca }}</td>
        <td colspan="2">{{ ($equipo->modelos)->ModeloEquipo }}</td>
        <td colspan="2">{{ $equipo->imei }}</td>
        @if ($equipo->Asignado == 0)
        <td colspan="2">{{ "Libre" }}</td>
    @else
        <td colspan="2">{{ "Asignado" }}</td>
    @endif
        <td colspan="2"><a href="{{ route('editar_equipo', ['id' => $equipo->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i></a></td>
        <td colspan="2"><a onclick="return confirm('Seguro?')" href="{{ route('eliminar_equipo', ['id' => $equipo->id]) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>  
    </tr>
    @endforeach
</tbody>
</table>  
{{$equipos->links()}}
@endsection