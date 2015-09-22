<?php 

class DirectorioController extends BaseController{

	public function actionInsertar(){
		
		if ($_POST) {
			try{
				DB::beginTransaction();

				$mensajeGlobal='';
				$revisando= Validator::make(
					[
						'nombreCompleto' => Input::get('txtNombreC'),
						'telefono' => Input::get('txtTelefono'),					
					],
					[
						'nombreCompleto' => 'required',
						'telefono' => 'required'				
					]
					); 

				if ($revisando->fails()) {
						if ($revisando->messages()->first('nombreCompleto')!='') {
							$mensajeGlobal.='Nombre es Campo Requerido <br>';
						}
						if ($revisando->messages()->first('telefono')!='') {
							$mensajeGlobal.='Telefono es Campo Requerido<br>';
						}
				}

				if ($mensajeGlobal!='') {
					return View::make('directorio/insertar',Input::all(),['mensajeGlobal' => $mensajeGlobal, 'color' => 'red']);
				}

				$tUsuario = TUsuario::whereRaw('nombreUsuario=?', [Session::get('usuario')])->get();
				
				$tDirectorio = new TDirectorio;

				$tDirectorio->idUsuario= $tUsuario[0]->idUsuario;
				$tDirectorio->nombreCompleto = Input::get('txtNombreC');
				$tDirectorio->direccion = Input::get('txtDireccion');
				$tDirectorio->telefono = Input::get('txtTelefono');
				$tDirectorio->fechaNacimiento = Input::get('txtFechaNac');

				$tDirectorio->save();

				Session::flash('mensajeGlobal','Directorio Registrado Satisfactoriamente');
				Session::flash('color','#019D59');

				DB::commit();

				return Redirect::to('directorio/insertar');

			}catch(Exception $ex){
				DB::rollback();

				Session::flash('mensajeGlobal','Ocurrio un error inesperado ...');
				Session::flash('color','red');
				return Redirect::to('directorio/insertar');

			}

			
		}

		if (Session::has('mensajeGlobal')) {
			return View::make('directorio/insertar',['mensajeGlobal'=>Session::get('mensajeGlobal'), 'color'=>Session::get('color')]);
		}

		return View::make('directorio/insertar');
	}

	public function actionVerPorIdUsuario(){
		
		$tUsuario=TUsuario::whereRaw('nombreUsuario=?',[Session::get('usuario')])->get();

		$listaTDirectorio= TDirectorio::whereRaw('idUsuario=?',[$tUsuario[0]->idUsuario])->get();

		return View::make('directorio/verporidusuario',['listaTDirectorio' => $listaTDirectorio]);

	}
}
 ?>
