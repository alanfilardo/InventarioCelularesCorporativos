@extends('layouts.base')

@section('Titulo')
    Marcas Equipos
@endsection

@section('ApartadoTitulo')
    Listado Marcas
@endsection

@section('Contenido')
    <form autocomplete="off" action="{{route('actualizar_marca', ['id' => $Marca->id])}}" method="POST" name="formularioMarcaCrear" class="formulario" id="formulario_general">
        @csrf
        <label for="marcaInput">Nombre Marca:</label>
    <input type="text" class="inputForm" name="NombreMarca" id="marcaInput" value="{{$Marca->NombreMarca}}" required placeholder="Ej: Samsung">
    <button type="submit" class="btn btn-danger btn-sm">Editar</button>
    </form>
@endsection