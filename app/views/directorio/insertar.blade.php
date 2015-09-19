@extends('layout')
@section('cuerpo')
<h1>Registrar directorio</h1>				

	<form action="/laravelDirectorioTelefonico/public/directorio/insertar" method="post">
		<label for="txtNombreC">Nombre Completo:</label> <br>
		<input type="text" size="50" id="txtNombreC" name="txtNombreC" value="{{{$txtNombreC or ''}}} "><br>

		<label for="txtDireccion">Direccion:</label> <br>
		<input type="text" size="50" id="txtDireccion" name="txtDireccion" value="{{{$txtDireccion or ''}}} "><br>

		<label for="txtTelefono">Telefono</label> <br>
		<input type="text" size="50" id="txtTelefono" name="txtTelefono" value="{{{$txtTelefono or ''}}} "><br>

		<label for="txtFechaNac">Fecha de nacimiento</label> <br>
		<input type="date" id="txtFechaNac" name="txtFechaNac"><br>

		
		<input type="submit" value="Guardar Registro">
	</form>

@stop
