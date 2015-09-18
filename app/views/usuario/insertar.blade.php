@extends('layout')
@section('cuerpo')

	<form action="/laravelDirectorioTelefonico/public/usuario/insertar" method="post">
		<label for="txtNombre">Nombre:</label> <br>
		<input type="text" size="50" id="txtNombre" name="txtNombre" value="{{{$txtNombre or ''}}} "><br>

		<label for="txtApellido">Apellido:</label> <br>
		<input type="text" size="50" id="txtApellido" name="txtApellido" value="{{{$txtApellido or ''}}} "><br>

		<label for="txtUsuario">Usuario</label> <br>
		<input type="text" size="50" id="txtUsuario" name="txtUsuario" value="{{{$txtUsuario or ''}}} "><br>

		<label for="txtContrasenia">Contraseña</label> <br>
		<input type="password" size="50" id="txtContrasenia" name="txtContrasenia"><br>

		<label for="txtConfirmarContrasenia">Confirmar  Contraseña</label>	 <br>
		<input type="password" size="50" id="txtConfirmarContrasenia" name="txtConfirmarContrasenia"><br><br>
			
		<input type="submit" value="Guardar Registro">
	</form>

@stop

