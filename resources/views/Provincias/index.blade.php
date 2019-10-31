@extends('layouts.base')

@section('Titulo')
    Provincias
@endsection

@section('ApartadoTitulo')
    Listado de Provincias
@endsection


@section('Contenido')
<div class="contenedor-agregar">
    <a class="btn btn-success boton-agregar" href="{{route('crear_provincia')}}" style="float: right;"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
    </div>
<table class="table table-sm text-center table-hover">
    <thead>
          <tr>
            <th colspan="2" scope="col">Pais</th>
            <th colspan="2" scope="col">Provincias</th>
            <th colspan="2" scope="col">Editar</th>
            <th colspan="2" scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
@foreach ($provincias as $provincia)
    <tr>
        <td colspan="2">{{ ($provincia->paises)->NombrePais }}</td>
        <td colspan="2">{{ $provincia->NombreProvincia }}</td>
        <td colspan="2"><a href="{{ route('editar_provincia', ['id' => $provincia->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i></a></td>
        <td colspan="2"><a onclick="return confirm('Seguro?')" href="{{ route('eliminar_provincia', ['id' => $provincia->id]) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>
       
    </tr>
@endforeach
        </tbody>
 </table>    
 {{$provincias->links()}}
@endsection


