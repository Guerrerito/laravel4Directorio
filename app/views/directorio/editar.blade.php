@extends('layout')
@section('cuerpo')

<h1>Vamos a Editar</h1>	<br>	

<form action="/laravelDirectorioTelefonico/public/directorio/editar" method="post">
		<input	type="hidden" id="txtIdDirectorio" name="txtIdDirectorio" value="{{{$tDirectorio->idDirectorio}}}">	
		<label for="txtNombreC">Nombre Completo:</label> <br>
		<input type="text" size="50" id="txtNombreC" name="txtNombreC" value="{{{$tDirectorio->nombreCompleto}}}"><br>

		<label for="txtDireccion">Direccion:</label> <br>
		<input type="text" size="50" id="txtDireccion" name="txtDireccion" value="{{{$tDirectorio->direccion}}}"><br>

		<label for="txtTelefono">Telefono</label> <br>
		<input type="text" size="50" id="txtTelefono" name="txtTelefono" value="{{{$tDirectorio->telefono}}}"><br>

		<label for="txtFechaNac">Fecha de nacimiento</label> <br>
		<input type="date" id="txtFechaNac" name="txtFechaNac" value="{{{$tDirectorio->fechaNacimiento}}}"><br>

		
		<input type="submit" value="Editar Contacto">

</form>



@stop