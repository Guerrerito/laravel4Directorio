<?php 

class UsuarioController extends BaseController{

	public function actionInsertar(){
		
		if ($_POST) {
			
			$mensajeGlobal='';
			$revisando= Validator::make(
				[
					'nombre' => Input::get('txtNombre'),
					'apellido' => Input::get('txtApellido'),
					'nombreUsuario' => Input::get('txtUsuario'),
					'contrasenia' => Input::get('txtContrasenia')
				],
				[
				'nombre' => 'required',
				'apellido' => 'required',
				'nombreUsuario' => 'required|unique:TUsuario',
				'contrasenia' => 'required'
				]
				); 
			if ($revisando->fails()) {
					if ($revisando->messages()->first('nombre')!='') {
						$mensajeGlobal.='Nombre es Campo Requerido <br>';
					}
					if ($revisando->messages()->first('apellido')!='') {
						$mensajeGlobal.='Apellido es Campo Requerido<br>';
					}
					if ($revisando->messages()->first('nombreUsuario')!='') {
						$mensajeGlobal.='Usuario es obligatorio o ya ha sido ocupado. <br>';
					}
					if ($revisando->messages()->first('contrasenia')!='') {
						$mensajeGlobal.='Contraseñas es Campo Requerido <br>';
					}

			}

			if (Input::get('txtContrasenia')!=Input::get('txtConfirmarContrasenia')) {
				$mensajeGlobal.='las contraseñas no coinciden';
			}
			if ($mensajeGlobal!='') {
				return View::make('usuario/insertar',Input::all(),['mensajeGlobal' => $mensajeGlobal, 'color' => 'red']);
			}
			 
			$tUsuario = new TUsuario;

			$tUsuario->nombre = Input::get('txtNombre');
			$tUsuario->apellido = Input::get('txtApellido');
			$tUsuario->nombreUsuario = Input::get('txtUsuario');
			$tUsuario->contrasenia = Crypt::encrypt(Input::get('txtContrasenia'));

			$tUsuario->save();

			Session::flash('mensajeGlobal','Usuario Registrado Satisfactoriamente');
			Session::flash('color','#019D59');

			return Redirect::to('usuario/insertar');
			
		}
		$patch='';
		if (Session::has('mensajeGlobal')) {
 			return View::make('usuario/insertar',['mensajeGlobal' => Session::get('mensajeGlobal'), 'color' => Session::get('color')]);
			
		}

		return View::make('usuario/insertar');

	}

	public function actionLogin(){

		if ($_POST) {
			$tUsuario = TUsuario::whereRaw('nombreUsuario=?', [Input::get('txtUsuario')])->get();
		
		if (count($tUsuario)>0) {
			if (Crypt::decrypt($tUsuario[0]->contrasenia)==Input::get('txtContrasenia')) {
					
					Session::put('usuario',$tUsuario[0]->nombreUsuario);
					
					return Redirect::to('usuario/insertar');

				}else{
					return View::make('usuario/login',['mensajeGlobal' => 'Usuario o contraseña no Existen en el sistema ...', 'color' => 'red']);
				}	
		}else{
					return View::make('usuario/login',['mensajeGlobal' => 'Usuario o contraseña no Existen en el sistema ...', 'color' => 'red']);
		}	
		}
		

		return View::make('usuario/login');

	}

	public function actionCerrar(){
		Session::forget('usuario');
		return Redirect::to('usuario/login');
	}

	public function actionVerPorNombre(){
		$tUsuario=TUsuario::whereRaw('nombreUsuario=?',[Session::get('usuario')])->get();

		if (Session::has('mensajeGlobal')) {
 			return View::make('usuario/verpornombreusuario',['mensajeGlobal' => Session::get('mensajeGlobal'), 'color' => Session::get('color'), 'tUsuario'=> $tUsuario]);
			
		}

		return View::make('usuario/verpornombreusuario',['tUsuario'=> $tUsuario]);
	}

	public function actionEditar($idUsuario=null){
					$mensajeGlobal="";
		if ($_POST) {

			$revisando=Validator::make(
					[
					'nombre' => Input::get('txtNombre'),
					'apellido' => Input::get('txtApellido'),
					'nombreUsuario' => Input::get('txtUsuario'),
					'contrasenia' => Input::get('txtContrasenia')
					],
					[
					'nombre' => 'required',
					'apellido' => 'required',
					'nombreUsuario' => 'required',
					'contrasenia' => 'required'
					]
				);
			if ($revisando->fails()) {
					if ($revisando->messages()->first('nombre')!='') {
						$mensajeGlobal.='Nombre es Campo Requerido <br>';
					}
					if ($revisando->messages()->first('apellido')!='') {
						$mensajeGlobal.='Apellido es Campo Requerido<br>';
					}
					if ($revisando->messages()->first('nombreUsuario')!='') {
						$mensajeGlobal.='Usuario es obligatorio o ya ha sido ocupado. <br>';
					}
					if ($revisando->messages()->first('contrasenia')!='') {
						$mensajeGlobal.='Contraseñas es Campo Requerido <br>';
					}
			}
			if ($mensajeGlobal!='') {
				Session::flash('mensajeGlobal',$mensajeGlobal);
				Session::flash('color','red');

				return Redirect::to('usuario/verpornombreusuario');
			}
			if (TUsuario::whereRaw('idUsuario!=? and nombreUsuario=?',[Input::get('txtIdUsuario'), Input::get('txtUsuario')])->count()>0) {
				
				Session::flash('mensajeGlobal','El usuario ya existe en el sistema');
				Session::flash('color','red');

				return Redirect::to('usuario/verpornombreusuario');
			}

			if (Input::get('txtContrasenia')!=Input::get('txtConfirmarContrasenia')) {
				
				Session::flash('mensajeGlobal','Las Contraseñas no coinciden, Debes de poner la misma .. ');
				Session::flash('color','red');

				return Redirect::to('usuario/verpornombreusuario');
			}


			$tUsuario=TUsuario::find(Input::get('txtIdUsuario'));

			if (Input::get('txtContraseniaAnterior')!=Crypt::decrypt($tUsuario->contrasenia)) {
				
				Session::flash('mensajeGlobal','Contraseña Incorrecta ');
				Session::flash('color','red');

				return Redirect::to('usuario/verpornombreusuario');	
			}

			$tUsuario->nombre = Input::get('txtNombre');
			$tUsuario->apellido = Input::get('txtApellido');
			$tUsuario->nombreUsuario = Input::get('txtUsuario');
			$tUsuario->contrasenia = Crypt::encrypt(Input::get('txtContrasenia'));

			$tUsuario->save();

			Session::put('usuario',Input::get('txtUsuario'));
			Session::flash('mensajeGlobal','Edicion Completada ... ');
			Session::flash('color','#176DEE');

			return Redirect::to('usuario/verpornombreusuario'); 

		}

		$tUsuario=TUsuario::find($idUsuario);

		return View::make('usuario/editar',['tUsuario'=>$tUsuario]);

	}
}
 ?>








