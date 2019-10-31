@extends('layouts.base')

@section('Titulo')
    Provincias
@endsection
@section('ApartadoTitulo')
    Agregar Provincia
@endsection

@section('Contenido')
<form autocomplete="off" action="{{route('guardar_provincia')}}" method="post" name="formularioProvinciaCrear" class="formulario">
        @csrf
        <label for="PaisesLista">Pais:</label>
        <select name="NombrePais" id="PaisesLista">
          <option selected disabled hidden value="Seleccionar Pais">Seleccionar Pais</option>
          @foreach ($paises as $pais)
            <option value="{{$pais->id}}">{{$pais->NombrePais}}</option>
          @endforeach
        </select>

        <label for="provinciaInput">Provincia:</label>
        <input type="text" class="inputForm" name="NombreProvincia" id="provinciaInput" value="" required placeholder="Ej: Buenos Aires">
        <input type="submit" value="Crear">
    </form>
@endsection

