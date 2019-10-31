@extends('layouts.base')

@section('Titulo')
    Paises
@endsection
@section('ApartadoTitulo')
    Agregar País
@endsection

@section('Contenido')
    <form autocomplete="off" action="{{route('guardar_pais')}}" method="POST" name="formularioPaisCrear" class="formulario" id="formulario_general">
        @csrf
        <label for="paisInput">País</label>
        <input type="text" class="inputForm" name="NombrePais" id="paisInput" value="" required placeholder="Ej: Argentina">
        <input type="submit" value="Crear">
    </form>
@endsection