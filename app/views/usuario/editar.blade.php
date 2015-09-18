@extends('layout')
@section('cuerpo')
<h1>Editar Registro</h1> <br>
<form action="/laravelDirectorioTelefonico/public/usuario/editar" method="post">
		<input type="hidden" size="50" id="txtIdUsuario" name="txtIdUsuario" value="{{{$tUsuario->idUsuario }}} "><br>

		<label for="txtNombre">Nombre:</label> <br>
		<input type="text" size="50" id="txtNombre" name="txtNombre" value="{{{$tUsuario->nombre }}} "><br>

		<label for="txtApellido">Apellido:</label> <br>
		<input type="text" size="50" id="txtApellido" name="txtApellido" value="{{{$tUsuario->apellido}}} "><br>

		<label for="txtUsuario">Usuario</label> <br>
		<input type="text" size="50" id="txtUsuario" name="txtUsuario" value="{{{$tUsuario->nombreUsuario}}} "><br>
		<label for="txtContraseniaAnterior">Contraseña Anterior</label> <br>
		<input type="password" size="50" id="txtContraseniaAnterior" name="txtContraseniaAnterior"><br><br>

		<label for="txtContrasenia">Contraseña Nueva</label> <br>
		<input type="password" size="50" id="txtContrasenia" name="txtContrasenia"><br>

		<label for="txtConfirmarContrasenia">Confirmar  Contraseña</label>	 <br>
		<input type="password" size="50" id="txtConfirmarContrasenia" name="txtConfirmarContrasenia"><br><br>
			
		<input type="submit" value="Editar Registro">
	</form>


@stop
