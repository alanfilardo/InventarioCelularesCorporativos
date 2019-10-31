@extends('layouts.base')

@section('Titulo')
    Modelos Equipos
@endsection

@section('ApartadoTitulo')
    Agregar Modelo
@endsection

@section('Contenido')
<form autocomplete="off" action="{{route('guardar_modelo')}}" method="post" name="formularioModeloCrear" class="formulario">
        @csrf
        <label for="MarcaLista">Marca:</label>
        <select name="NombreMarca" id="MarcaLista">
          <option value="Seleccionar Marca">Seleccionar Marca</option>
          @foreach ($marcas as $marca)
        <option value="{{ $marca->id }}">{{ $marca->NombreMarca }}</option>
          @endforeach
        </select>

        <label for="modeloInput">Modelo:</label>
        <input type="text" class="inputForm" name="NombreModelo" id="modeloInput" value="" required placeholder="Ej: J7">
        <input type="submit" value="Crear">
    </form>
@endsection

