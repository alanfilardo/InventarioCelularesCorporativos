@extends('layouts.base')

@section('Titulo')
    Sucursales
@endsection

@section('ApartadoTitulo')
    Agregar Sucursal
@endsection

@section('Contenido')
<form action="{{route('guardar_sucursal')}}" method="post" name="formularioSucursalCrear" class="formulario">
        @csrf
        <label for="ProvinciaLista">Provincia:</label>
        <select name="ProvinciaId" id="ProvinciasLista">
          <option value="Seleccionar Provincia">Seleccionar Provincia</option>
          @foreach ($provincias as $provincia)
        <option value="{{ $provincia->id }}">{{ $provincia->NombreProvincia }}</option>              
          @endforeach
        </select>

        <label for="sucursalInput">Sucursal:</label>
        <input type="text" class="inputForm" name="NombreSucursal" id="sucursalInput" value="" required placeholder="Ej: Moreno">
        <input type="submit" value="Crear">
    </form>
@endsection

