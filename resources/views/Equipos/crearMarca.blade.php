@extends('layouts.base')

@section('Titulo')
    Marcas Equipos
@endsection

@section('ApartadoTitulo')
    Listado Marcas
@endsection

@section('Contenido')
    <form autocomplete="off" action="{{route('guardar_marca')}}" method="POST" name="formularioMarcaCrear" class="formulario" id="formulario_general">
        @csrf
        <label for="marcaInput">Nombre Marca</label>
        <input type="text" class="inputForm" name="NombreMarca" id="marcaInput" value="" required placeholder="Ej: Samsung">
        <input type="submit" value="Crear">
    </form>
@endsection