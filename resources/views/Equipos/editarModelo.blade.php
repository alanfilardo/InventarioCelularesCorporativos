@extends('layouts.base')

@section('Titulo')
    Modelos Equipos
@endsection

@section('ApartadoTitulo')
    Agregar Modelo
@endsection

@section('Contenido')
<div class="contenedor-cancelar">
  <a class="btn btn-success boton-agregar" href="{{route('modelos')}}" style="float: right;">Cancelar</a>
</div>
<form autocomplete="off" action="{{route('actualizar_modelo', ['id' => $Modelo->id])}}" method="post" name="formularioModeloCrear" class="formulario">
        @csrf
        <label for="MarcaLista">Marca:</label>
        <select name="NombreMarca" id="MarcaLista">
          <option value="{{ ($Modelo->marcas)->id }}">{{($Modelo->marcas)->NombreMarca}}</option>
          @foreach ($Marcas as $marca)
        <option value="{{ $marca->id }}">{{ $marca->NombreMarca }}</option>
          @endforeach
        </select>

        <label for="modeloInput">Modelo:</label>
      <input type="text" class="inputForm" name="NombreModelo" id="modeloInput" value="{{$Modelo->ModeloEquipo}}" required placeholder="Ej: J7">
        <input type="submit" value="Editar">
    </form>
@endsection

