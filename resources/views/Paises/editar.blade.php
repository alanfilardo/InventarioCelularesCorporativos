@extends('layouts.base')

@section('Titulo')
    Paises
@endsection
@section('ApartadoTitulo')
    Editar País
@endsection

@section('Contenido')
    <form autocomplete="off" action="{{ route('actualizar_pais', ['id' => $Pais->id]) }}" method="POST" name="formularioPaisEditar" class="formulario" id="formulario_general">
        @csrf
        <label for="paisInput">País</label>
    <input type="text" class="inputForm" name="NombrePais" id="paisInput" value="{{ $Pais->NombrePais }}" required>
    <button type="submit" class="btn btn-danger btn-sm">Editar</button>
 
    </form>
@endsection