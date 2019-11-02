@extends('layouts.base')

@section('Titulo')
    Sucursales
@endsection

@section('ApartadoTitulo')
    Agregar Sucursal
@endsection

@section('Contenido')
<div class="contenedor-cancelar">
  <a class="btn btn-success boton-agregar" href="{{route('sucursales')}}" style="float: right;">Cancelar</a>
</div>
<form action="{{route('actualizar_sucursal', ['id'=>$sucursal->id])}}" method="post" name="formularioSucursalCrear" class="formulario">
        @csrf
        <label for="ProvinciaLista">Provincia:</label>
        <select name="ProvinciaId" id="ProvinciasLista">
          <option value="{{ $provincia->id }}">{{ $provincia->NombreProvincia }}</option>
          @foreach ($Provincias as $Provincia)
          @if ($provincia->id == $Provincia->id)
              
          @else
          <option value="{{ $Provincia->id }}">{{ $Provincia->NombreProvincia }}</option> 
          @endif
                     
          @endforeach
        </select>

        <label for="sucursalInput">Sucursal:</label>
      <input type="text" class="inputForm" name="NombreSucursal" id="sucursalInput" value="{{$sucursal->NombreSucursal}}" required placeholder="Ej: Moreno">
      <button type="submit" class="">Editar</button>
    </form>
@endsection

