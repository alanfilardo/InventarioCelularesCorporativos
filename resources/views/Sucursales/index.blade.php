@extends('layouts.base')

@section('Titulo')
    Sucursales
@endsection

@section('ApartadoTitulo')
    Listado de Sucursales
@endsection

@section('Contenido')
<div class="contenedor-agregar">
    <a class="btn btn-success boton-agregar" href="{{route('crear_sucursal')}}" style="float: right;"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
    </div>
<table class="table table-sm text-center table-hover">
    <thead>
          <tr>
            <th colspan="2" scope="col">Pais</th>
            <th colspan="2" scope="col">Provincia</th>
            <th colspan="2" scope="col">Sucursales</th>
            <th colspan="2" scope="col">Editar</th>
            <th colspan="2" scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
@foreach ($sucursales as $sucursal)
    <tr>
        <td colspan="2">{{ (($sucursal->provincias)->paises)->NombrePais }}</td>
        <td colspan="2">{{ ($sucursal->provincias)->NombreProvincia }}</td>
        <td colspan="2">{{ $sucursal->NombreSucursal }}</td>
        <td colspan="2"><a href="{{ route('editar_sucursal', ['id' => $sucursal->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i></a></td>
        <td colspan="2"><a onclick="return confirm('Seguro?')" href="{{ route('eliminar_sucursal', ['id' => $sucursal->id]) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>
    </tr>
@endforeach
        </tbody>
</table>    
{{ $sucursales->links() }}
@endsection


