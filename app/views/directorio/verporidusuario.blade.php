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
		</tr>
		@endforeach
	</tbody>
</table>








@stop