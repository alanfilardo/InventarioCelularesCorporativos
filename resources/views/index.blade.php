@extends('layouts.base')

@section('Titulo')
    Clientes
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