@extends('layouts.base')

@section('Titulo')
    Clientes
@endsection

@section('Titulo')
    Agregar Cliente
@endsection

@section('Contenido')
    <form autocomplete="off" action="{{route('guardar_cliente')}}" method="POST" name="formularioClienteCrear" class="" id="formulario_general">
        @csrf
    <div class="formularioflex">
      <div class="formularioizquierdo">
        <label class="bloque" for="NombreCliente">Nombre:</label>
        <input class="bloque" type="text" name="NombreCliente" value="" required placeholder="Ej: Alan">
        
        
        <label class="bloque" for="ApellidoCliente">Apellido:</label>
        <input class="bloque" type="text" name="ApellidoCliente" value="" required placeholder="Ej: Filardo">

        <label class="bloque" for="SucursalCliente">Sucursal:</label>
        <select class="bloque" name="SucursalCliente" required>
            @foreach ($Sucursales as $Sucursal)
                <option value="{{ $Sucursal->id }}">{{ $Sucursal->NombreSucursal }}</option>
            @endforeach
        </select>
        <label class="bloque" for="LineaCliente">Número de Linea:</label>
        <select class="bloque" name="LineaCliente" required>
                <option value="" selected disabled hidden>Seleccionar Linea</option>
            @foreach ($Lineas as $Linea)
                <option value="{{ $Linea->id }}">{{ $Linea->NumeroLinea }}</option>
            @endforeach
        </select>

        <label class="bloque" for="EquipoCliente">Equipo Asignar:</label>
        <select class="bloque" name="EquipoCliente" required>
            <option value="" selected disabled hidden>Seleccionar Equipo</option>
            @foreach ($Equipos as $Equipo)
                <option value="{{ $Equipo->id }}">{{ $Equipo->imei }}</option>
            @endforeach
        </select>

    </div>
    <div class="formulariocentro">
            <label class="bloque" for="GmailCliente">Gmail:</label>
            <input class="bloque" type="email" name="GmailCliente" value="" placeholder="Ej: usuario@gmail.com">
            <label class="bloque" for="GmailPassword">Password Gmail:</label>
            <input class="bloque" type="text" name="GmailPassword" value="" placeholder="Ej: Password123">
            
            <label class="bloque" for="SamsungCliente">Samsung:</label>
            <input class="bloque" type="email" name="SamsungCliente" value="" placeholder="Ej: usuario@gmail.com">
            <label class="bloque" for="SamsungPassword">Password Samsung:</label>
            <input class="bloque" type="text" name="SamsungPassword" value="" placeholder="Ej: Password123">
            
            <label class="bloque" for="AppleCliente">Apple ID:</label>
            <input class="bloque" type="email" name="AppleCliente" value="" placeholder="Ej: usuario@gmail.com">
            <label class="bloque" for="ApplePassword">Password Apple:</label>
            <input class="bloque" type="text" name="ApplePassword" value="" placeholder="Ej: Password123">
            

        
        
    </div>
    </div>
    <input class="bloque boton" type="submit" value="Crear">
    </form>
@endsection