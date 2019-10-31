@extends('layouts.base')

@section('Titulo')
    Lineas
@endsection

@section('ApartadoTitulo')
    Agregar Linea
@endsection

@section('Contenido')
    <form autocomplete="off" action="{{route('guardar_linea')}}" method="POST" name="formularioLineaCrear" class="formulario" id="formulario_general">
        @csrf
        <label for="lineaInput">Número de Linea</label>
        <input type="text" class="inputForm" name="NumeroLinea" id="numeroInput" value="" required placeholder="Ej: 1150368725">
        <input type="submit" value="Crear">
    </form>
@endsection