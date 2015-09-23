<?php 

class OtrosController extends BaseController{

	public function actionImprimirExcel(){
		$tUsuario=TUsuario::whereRaw('nombreUsuario=?',[Session::get('usuario')])->get();
		$listaTDirectorio= TDirectorio::whereRaw('idUsuario=?',[$tUsuario[0]->idUsuario])->get();
				
		Excel::create('Lista de directorio', function($excel) use($listaTDirectorio){
			$excel->sheet('Sheetname', function($sheet) use($listaTDirectorio){
				$data=[];
				array_push($data,array('USUARIO', 'NOMBRE CONTACTO', 'DIRECCION', 'TELEFONO', 'FECHA DE NACIMINETO', 'FECHA DE REGISTRO'));	

				foreach ($listaTDirectorio as $key => $value) {
					array_push($data,array($value->tUsuario->nombreUsuario, $value->nombreCompleto, $value->direccion, $value->telefono, (string)$value->fechaNacimiento, (string)$value->created_at));	

				}
				// array_push($data,array('Kevin','','','Arnold','Arias','Figueroa'));				

				$sheet->fromArray($data,null,'A1',false,false);
			
			});
		})->download('xlsx');
	}
}






 ?>