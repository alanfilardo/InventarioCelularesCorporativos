@extends('layouts.base')

@section('Titulo')
    Equipos
@endsection

@section('ApartadoTitulo')
    Agregar Equipo
@endsection

@section('Contenido')
<div class="contenedor-cancelar">
  <a class="btn btn-success boton-agregar" href="{{route('equipos')}}" style="float: right;">Cancelar</a>
</div>
<form autocomplete="off" action="{{route('actualizar_equipo', ["id" => $Equipo->id])}}" method="post" name="formularioEquipoCrear" class="formulario">
        @csrf

        <label for="MarcaLista">Marca:</label>
        <select name="NombreMarca" id="MarcaLista">
        <option value="{{ (($Equipo->modelos)->marcas)->id }}">{{(($Equipo->modelos)->marcas)->NombreMarca}}</option>
          @foreach ($Marcas as $marca)
        <option value="{{ $marca->id }}">{{ $marca->NombreMarca }}</option>
          @endforeach
        </select>

        <label for="ModeloLista">Modelo:</label>
        <select name="NombreModelo" id="ModeloLista">
        <option value="{{($Equipo->modelos)->id}}">{{($Equipo->modelos)->ModeloEquipo}}</option>
          @foreach ($Modelos as $modelo)
        <option value="{{ $modelo->id }}">{{ $modelo->ModeloEquipo }}</option>
          @endforeach
        </select>

        <label for="imeiInput">IMEI</label>
        <input type="text" class="inputForm" name="imei" id="imeiInput" value="{{$Equipo->imei}}" required placeholder="Ej: 354688065202743">
        <input type="submit" value="Editar">
    </form>
@endsection

