@extends('layouts.base')

@section('Titulo')
    Modelos Equipos
@endsection

@section('ApartadoTitulo')
    Listado de Modelos
@endsection

@section('Contenido')
<div class="contenedor-agregar">
  <a class="btn btn-success boton-agregar" href="{{route('crear_modelo')}}" style="float: right;"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
  </div>
<table class="table table-sm text-center table-hover">
        <thead>
              <tr>
                <th colspan="2" scope="col">Marcas</th>
                <th colspan="2" scope="col">Modelos</th>
                <th colspan="2" scope="col">Editar</th>
                <th colspan="2" scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
    

@foreach ($modelos as $modelo)

<tr>
        <td colspan="2">{{ ($modelo->marcas)->NombreMarca }}</td>
        <td colspan="2">{{ $modelo->ModeloEquipo }}</td>
        <td colspan="2"><a href="{{ route('editar_modelo', ['id' => $modelo->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i></a></td>
        <td colspan="2"><a onclick="return confirm('Seguro?')" href="{{ route('eliminar_modelo', ['id' => $modelo->id]) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>  
</tr>
@endforeach
</tbody>
</table>  
{{$modelos->links()}}
@endsection