@extends('layouts.base')

@section('Titulo')
    Clientes
@endsection

@section('ApartadoTitulo')
    Listado de Clientes
@endsection

@section('Contenido')
<div class="contenedor-agregar">
  <a class="btn btn-success boton-agregar" href="{{route('crear_cliente')}}" style="float: right;"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
  </div>
<table id="listado" class="table table-sm text-center table-hover">
        <thead>
              <tr>
                <th colspan="2" scope="col">Apellido</th>
                <th colspan="2" scope="col">Nombre</th>
                <th colspan="2" scope="col">Sucursal</th>
                <th colspan="2" scope="col">Editar</th>
                <th colspan="2" scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>

@foreach ($Clientes as $Cliente)
<tr>
        <td colspan="2">{{ $Cliente->apellidocliente }}</td>
        <td colspan="2">{{ $Cliente->nombrecliente }}</td>
        <td colspan="2">{{ ($Cliente->sucursal)->NombreSucursal }}</td>
        <td colspan="2"><a href="{{ route('editar_cliente', ['id' => $Cliente->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i></a></td>
        <td colspan="2"><a onclick="return confirm('Seguro?')" href="{{ route('eliminar_cliente', ['id' => $Cliente->id]) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>  
    </tr>
    @endforeach
</tbody>
</table>  
{{$Clientes->links()}}

@endsection
@section('Scripts')


@endsection