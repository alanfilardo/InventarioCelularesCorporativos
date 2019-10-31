
@extends('layouts.base')

@section('Titulo')
    Equipos
@endsection

@section('ApartadoTitulo')
    Agregar Equipo
@endsection

@section('Contenido')
<form autocomplete="off" action="{{route('guardar_equipo')}}" method="post" name="formularioEquipoCrear" class="formulario">
        @csrf

        

        <label for="MarcaLista">Marca:</label>
        <select name="NombreMarca" id="MarcaLista">
          <option value="Seleccionar Marca">Seleccionar Marca</option>
          @foreach ($marcas as $marca)
        <option value="{{ $marca->id }}">{{ $marca->NombreMarca }}</option>
          @endforeach
        </select>

        <label for="ModeloLista">Modelo:</label>
        <select name="NombreModelo" id="ModeloLista">
          <option value="Seleccionar Modelo">Seleccionar Modelo</option>
          @foreach ($modelos as $modelo)
        <option value="{{ $modelo->id }}">{{ $modelo->ModeloEquipo }}</option>
          @endforeach
        </select>

        <label for="imeiInput">IMEI</label>
        <input type="text" class="inputForm" name="imei" id="imeiInput" value="" required placeholder="Ej: 354688065202743">
        <input class=""type="submit" value="Crear">
    </form>
@endsection


