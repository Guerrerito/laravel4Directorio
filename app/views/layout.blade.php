<html lang="es">
<head>
	<title>Direcctorio Telefonico</title>
	<link rel="stylesheet" type="text/css" href="/laravelDirectorioTelefonico/public/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="/laravelDirectorioTelefonico/public/css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="/laravelDirectorioTelefonico/public/css/jquery-ui.structure.min.css">
	<link rel="stylesheet" type="text/css" href="/laravelDirectorioTelefonico/public/css/jquery-ui.theme.min.css">
	<link rel="stylesheet" type="text/css" href="/laravelDirectorioTelefonico/public/css/csslayout.css">
	

	<script type="text/javascript" src="/laravelDirectorioTelefonico/public/js/prefixfree.min.js"></script>
	<script type="text/javascript" src="/laravelDirectorioTelefonico/public/js/jquery-ui.js"></script>
	<script type="text/javascript" src="/laravelDirectorioTelefonico/public/js/jquery.js"></script>
</head>
<body>
	<header>
		@if(Session::has('usuario'))
		<nav id="menuPrincipal">
			<ul>
				<li>
					<img src="/laravelDirectorioTelefonico/public/img/menu/add-user.png" style="height:50px; width:50px">
					<a href="/laravelDirectorioTelefonico/public/directorio/insertar">Registrar Contacto</a></li>
				<li>
					<img src="/laravelDirectorioTelefonico/public/img/menu/ev-events-image.png" style="height:50px; width:50px">
					<a href="/laravelDirectorioTelefonico/public/directorio/verporidusuario">Ver Directorio</a></li>
				<li>
					<img src="/laravelDirectorioTelefonico/public/img/menu/imprimir_icon.png" style="height:50px; width:50px">
					<a href="">Imprimir en Excel</a></li>
			</ul>
		</nav>
		@endif
		<div id="divAppSesion">
			<b>Session Iniciada como:<a href="/laravelDirectorioTelefonico/public/usuario/verpornombreusuario">@ {{{Session::get('usuario')}}} </a></b>
			<a href="/laravelDirectorioTelefonico/public/usuario/cerrarsesion">  Cerrar Sesion</a>
		</div>
	</header>
	<section id="cuerpoGeneral">
		<section id="cuerpoGeneralInterno">
			@if(isset($mensajeGlobal))
				<div style="color: {{{$color}}}"> {{$mensajeGlobal}} </div>
			@endif	
			@yield('cuerpo')
		</section>
	</section>
	<footer>
	</footer>

</body>
</html>