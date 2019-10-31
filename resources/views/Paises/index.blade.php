@extends('layouts.base')

@section('Titulo')
    Paises
@endsection
@section('ApartadoTitulo')
    Listado de Paises
@endsection

@section('Contenido')
<div class="contenedor-agregar">
<a class="btn btn-success boton-agregar" href="{{route('crear_pais')}}" style="float: right;"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
</div>
<table class="table table-sm text-center table-hover">
    <thead>
      <tr>
        <th colspan="2" scope="col">Paises</th>
        <th colspan="2" scope="col">Editar</th>
        <th colspan="2" scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($paises as $pais)
    <tr>
        <td colspan="2">{{ $pais->NombrePais }}</td>
        <td colspan="2"><a href="{{ route('editar_pais', ['id' => $pais->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i></a></td>
        <td colspan="2"><a onclick="return confirm('Seguro?')" href="{{ route('eliminar_pais', ['id' => $pais->id]) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>
    </tr>
      @endforeach
    </tbody>
    
</table>
{{ $paises->links() }}
@endsection





