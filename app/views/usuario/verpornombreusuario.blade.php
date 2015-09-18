@extends('layout')
@section('cuerpo')
<h1>Cargando los datos ... </h1>

<label>Nombre Completo: </label>{{{$tUsuario[0]->nombre}}} <br>
<label>Apellidos: </label> {{{$tUsuario[0]->apellido}}} <br>
<label>Usuario: </label> {{{$tUsuario[0]->nombreUsuario}}} <br>
<label>Fecha de Registro: </label> {{{$tUsuario[0]->created_at}}} <br>

<input type="button" value="Editar" onclick="window.location.href='/laravelDirectorioTelefonico/public/usuario/editar/{{{$tUsuario[0]->idUsuario}}}' ">
@stop