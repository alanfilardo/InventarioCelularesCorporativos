@extends('layouts.base')

@section('Titulo')
    Clientes
@endsection

@section('Titulo')
    Agregar Cliente
@endsection

@section('Contenido')
    <form autocomplete="off" action="{{route('actualizar_cliente', ["id" => $Cliente->id])}}" method="POST" name="formularioClienteCrear" class="" id="formulario_general">
        @csrf
    <div class="formularioflex">
      <div class="formularioizquierdo">
        <label class="bloque" for="NombreCliente">Nombre:</label>
      <input class="bloque" type="text" name="NombreCliente" value="{{$Cliente->nombrecliente}}" required placeholder="Ej: Alan">
        
        
        <label class="bloque" for="ApellidoCliente">Apellido:</label>
        <input class="bloque" type="text" name="ApellidoCliente" value="{{$Cliente->apellidocliente}}" required placeholder="Ej: Filardo">

        <label class="bloque" for="SucursalCliente">Sucursal:</label>
        <select class="bloque" name="SucursalCliente" required>
                <option value="{{ ($Cliente->sucursal)->id }}">{{ ($Cliente->sucursal)->NombreSucursal }}</option>
            @foreach ($Sucursales as $Sucursal)
                <option value="{{ $Sucursal->id }}">{{ $Sucursal->NombreSucursal }}</option>
            @endforeach
        </select>
        <label class="bloque" for="LineaCliente">Número de Linea:</label>
        <select class="bloque" name="LineaCliente" required>
        <option value="{{($Cliente->linea)->id}}">{{($Cliente->linea)->NumeroLinea}}</option>
            @foreach ($Lineas as $Linea)
                <option value="{{ $Linea->id }}">{{ $Linea->NumeroLinea }}</option>     
            @endforeach
        </select>

        <label class="bloque" for="EquipoCliente">Equipo Asignar:</label>
        <select class="bloque" name="EquipoCliente" required>
        <option value="{{($Cliente->equipo)->id}}">{{($Cliente->equipo)->imei}}</option>
            @foreach ($Equipos as $Equipo)
                <option value="{{ $Equipo->id }}">{{ $Equipo->imei }}</option>
            @endforeach
        </select>

    </div>
    <div class="formulariocentro">
            <label class="bloque" for="GmailCliente">Gmail:</label>
            <input class="bloque" type="email" name="GmailCliente" value="{{($Cliente->cuenta)->cuentagmail}}" placeholder="Ej: usuario@gmail.com">
            <label class="bloque" for="GmailPassword">Password Gmail:</label>
            <input class="bloque" type="text" name="GmailPassword" value="{{($Cliente->cuenta)->passwordgmail}}" placeholder="Ej: Password123">
            
            <label class="bloque" for="SamsungCliente">Samsung:</label>
            <input class="bloque" type="email" name="SamsungCliente" value="{{($Cliente->cuenta)->cuentasamsung}}" placeholder="Ej: usuario@gmail.com">
            <label class="bloque" for="SamsungPassword">Password Samsung:</label>
            <input class="bloque" type="text" name="SamsungPassword" value="{{($Cliente->cuenta)->passwordsamsung}}" placeholder="Ej: Password123">
            
            <label class="bloque" for="AppleCliente">Apple ID:</label>
            <input class="bloque" type="email" name="AppleCliente" value="{{($Cliente->cuenta)->cuentaapple}}" placeholder="Ej: usuario@gmail.com">
            <label class="bloque" for="ApplePassword">Password Apple:</label>
            <input class="bloque" type="text" name="ApplePassword" value="{{($Cliente->cuenta)->passwordapple}}" placeholder="Ej: Password123">
            

        
        
    </div>
    </div>
    <input style="width: 7%;" class="bloque boton" type="submit" value="Editar">
    </form>
@endsection