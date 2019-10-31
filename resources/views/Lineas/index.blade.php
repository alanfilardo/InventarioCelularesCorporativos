@extends('layouts.base')

@section('Titulo')
    Lineas
@endsection

@section('ApartadoTitulo')
    Listado de Lineas
@endsection

@section('Contenido')
<div class="contenedor-agregar">
    <a class="btn btn-success boton-agregar" href="{{route('crear_linea')}}" style="float: right;"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
    </div>
<table class="table table-sm text-center table-hover">
    <thead>
      <tr>
        <th colspan="2" scope="col">Lineas</th>
        <th colspan="2" scope="col">Estado</th>
        <th colspan="2" scope="col">Editar</th>
        <th colspan="2" scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>
     
@foreach ($lineas as $linea)
<tr>

        <td colspan="2">{{ $linea->NumeroLinea }}</td>
        @if ($linea->Asignado == 0)
            <td colspan="2">{{ "Libre" }}</td>
        @else
            <td colspan="2">{{ "Asignado" }}</td>
        @endif
        <td colspan="2"><a href="{{ route('editar_linea', ['id' => $linea->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i></a></td>
        <td colspan="2"><a onclick="return confirm('Seguro?')" href="{{ route('eliminar_linea', ['id' => $linea->id]) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>
    </tr>
@endforeach
    </tbody>
    
</table>
{{$lineas->links()}}
@endsection

