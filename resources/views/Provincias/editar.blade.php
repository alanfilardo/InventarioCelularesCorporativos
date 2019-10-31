@extends('layouts.base')

@section('Titulo')
    Provincias
@endsection
@section('ApartadoTitulo')
    Agregar Provincia
@endsection

@section('Contenido')
<form autocomplete="off" action="{{ route('actualizar_provincia', ['id'=>$ProvinciaSeleccionada->id]) }}" method="post" name="formularioProvinciaCrear" class="formulario">
  @csrf
  <label for="selectPaises">Pais:</label>
  <select name="selectPaises" id="">
  <option value="{{$PaisSeleccionado->id}}">{{$PaisSeleccionado->NombrePais}}</option>
  @foreach ($Paises as $Pais)
  @if ($PaisSeleccionado->id == $Pais->id)
      
  @else
  <option value="{{$Pais->id}}">{{$Pais->NombrePais}}</option>
  @endif
  
  @endforeach
  </select>

  <label for="provinciaInput">Provincia:</label>
<input type="text" class="inputForm" name="NombreProvincia" id="provinciaInput" value="{{ $ProvinciaSeleccionada->NombreProvincia }}" required placeholder="Ej: Buenos Aires">

<button type="submit" class="btn btn-danger btn-sm">Editar</button>

</form>
@endsection

