@extends('layouts.base')

@section('Titulo')
    Clientes
@endsection

@section('ApartadoTitulo')
    {{$Cliente->nombrecliente . " " . $Cliente->apellidocliente}}
@endsection

@section('Contenido')
    <form autocomplete="off" action="{{route('inicio')}}" method="get" name="formularioClienteCrear" class="" id="formulario_general">
        @csrf
    <div class="formularioflex">
      <div class="formularioizquierdo">
        <label style="display:none; class="bloque" for="NombreCliente">Nombre:</label>
      <input style="display:none; disabled class="bloque" type="text" name="NombreCliente" value="{{$Cliente->nombrecliente}}" required placeholder="Ej: Alan">
        
        <label style="display:none; class="bloque" for="ApellidoCliente">Apellido:</label>
        <input style="display:none; disabled class="bloque" type="text" name="ApellidoCliente" value="{{$Cliente->apellidocliente}}" required placeholder="Ej: Filardo">
       
        <label class="bloque" for="SucursalCliente">Pais:</label>
        <input disabled type="text" class="bloque" value="{{ ((($Cliente->sucursal)->provincias)->paises)->NombrePais }}">

        <label class="bloque" for="SucursalCliente">Sucursal:</label>
        <input disabled type="text" class="bloque" value="{{ ($Cliente->sucursal)->NombreSucursal }}">

        <label class="bloque" for="LineaCliente">Número de Linea:</label>
        <input disabled type="text" class="bloque" value="{{ ($Cliente->linea)->NumeroLinea }}">

        <label class="bloque" for="EquipoCliente">IMEI Asignado:</label>
        <input disabled type="text" class="bloque" value="{{($Cliente->equipo)->imei}}">

        <label class="bloque" for="EquipoCliente">Equipo Marca:</label>
        <input disabled type="text" class="bloque" value="{{((($Cliente->equipo)->modelos)->marcas)->NombreMarca}}">

        <label class="bloque" for="EquipoCliente">Equipo Modelo:</label>
        <input disabled type="text" class="bloque" value="{{((($Cliente->equipo)->modelos)->ModeloEquipo)}}">

    </div>
    <div class="formulariocentro">
            <label class="bloque" for="GmailCliente">Gmail:</label>
            <input disabled class="bloque" type="email" name="GmailCliente" value="{{($Cliente->cuenta)->cuentagmail}}" placeholder="Ej: usuario@gmail.com">
            <label class="bloque" for="GmailPassword">Password Gmail:</label>
            <input disabled class="bloque" type="text" name="GmailPassword" value="{{($Cliente->cuenta)->passwordgmail}}" placeholder="Ej: Password123">
            
            <label class="bloque" for="SamsungCliente">Samsung:</label>
            <input disabled class="bloque" type="email" name="SamsungCliente" value="{{($Cliente->cuenta)->cuentasamsung}}" placeholder="Ej: usuario@gmail.com">
            <label class="bloque" for="SamsungPassword">Password Samsung:</label>
            <input disabled class="bloque" type="text" name="SamsungPassword" value="{{($Cliente->cuenta)->passwordsamsung}}" placeholder="Ej: Password123">
            
            <label class="bloque" for="AppleCliente">Apple ID:</label>
            <input disabled class="bloque" type="email" name="AppleCliente" value="{{($Cliente->cuenta)->cuentaapple}}" placeholder="Ej: usuario@gmail.com">
            <label class="bloque" for="ApplePassword">Password Apple:</label>
            <input disabled class="bloque" type="text" name="ApplePassword" value="{{($Cliente->cuenta)->passwordapple}}" placeholder="Ej: Password123">
                   
    </div>
    </div>
    <input class="bloque boton" type="submit" value="Volver">
    </form>
@endsection