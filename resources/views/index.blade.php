@extends('layouts.base')

@section('Titulo')
    Clientes
@endsection
@section('Buscador')

<form action="{{route('buscar_clientes')}}" method="post" class="col-xs-12 col-sm-10 col-md-8 input-group input-group-sm" style="margin-top: 1em;" >
  @csrf  
  <input type="text" class="form-control" name="dato_buscado">
    <span class="input-group-btn">
      <button class="btn btn-info btn-flat" type="submit" >Buscar</button>
    </span>
    <select name="tipobusqueda" id="" class="form-control form-control-lg">
      <option value="1">Buscar por: Nombres</option>
      <option value="2">Buscar por: Lineas</option>
      <option value="3">Buscar por: Email</option>
      <option value="4">Buscar por: IMEI</option>
    </select>
</form>
@if ($Busqueda == 0)
<p class="text-danger">No se encontraron resultados.</p>    
@endif
@endsection

@section('ApartadoTitulo')
    Listado General Clientes
@endsection

@section('Contenido')

<table class="table table-sm text-center table-hover" id="listados">
        <thead>
              <tr>
                <th colspan="2" scope="col">Apellido</th>
                <th colspan="2" scope="col">Nombre</th>
                <th colspan="2" scope="col">Sucursal</th>
                <th colspan="2" scope="col">Linea</th>
                <th colspan="2" scope="col">Ver</th>
              </tr>
            </thead>
            <tbody>

@foreach ($Clientes as $Cliente)
<tr>
        <td colspan="2">{{ $Cliente->apellidocliente }}</td>
        <td colspan="2">{{ $Cliente->nombrecliente }}</td>
        <td colspan="2">{{ ($Cliente->sucursal)->NombreSucursal }}</td>
        <td colspan="2">{{ ($Cliente->linea)->NumeroLinea }}</td>
        <td colspan="2"><a href="{{ route('ver_cliente', ['id' => $Cliente->id]) }}" class="btn btn-info btn-sm"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
    </tr>
    @endforeach
</tbody>
</table>  
{{$Clientes->links()}}
@endsection