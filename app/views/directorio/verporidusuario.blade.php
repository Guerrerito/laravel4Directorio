@extends('layout')
@section('cuerpo')

<table border="1">
	<thead>
		<th>Nombre del Contacto</th>			
		<th>Direccion</th>
		<th>Telefono</th>
		<th>Fecha de Nacimiento</th>
		<th>Fecha de Registro</th>
		<th>Ultima modificacion</th>
		<th></th>
		<th></th>
	</thead>
	<tbody>
		@foreach($listaTDirectorio as $value)
		<tr>
			<td>{{{$value->nombreCompleto}}} </td>
			<td>{{{$value->direccion}}} </td>	
			<td>{{{$value->telefono}}} </td>	
			<td>{{{$value->fechaNacimiento}}} </td>	
			<td>{{{$value->created_at}}} </td>	
			<td>{{{$value->updated_at}}} </td>
			<td><input type="button" value="Editar" onclick="editar('{{{$value->idDirectorio}}}');"></td>		
			<td><input type="button" value="Eliminar" onclick="eliminar('{{{$value->idDirectorio}}}');"></td>
		</tr>
		@endforeach
	</tbody>
</table>
<script type="text/javascript">
	
	function editar(idDirectorio){
		window.location.href='/laravelDirectorioTelefonico/public/directorio/editar/'+ idDirectorio;
	}
	function eliminar(idDirectorio){
		if(confirm('¿Esta UD seguro de eliminar este Contacto?')){
			window.location.href='/laravelDirectorioTelefonico/public/directorio/eliminar/'+idDirectorio;	
		}else{
			alert('La operacion fue cancelada');
		}
		
	}

</script>








@stop