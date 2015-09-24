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

	public function actionImprimirPDF(){
 		$tUsuario=TUsuario::whereRaw('nombreUsuario=?',[Session::get('usuario')])->get();
		$listaTDirectorio= TDirectorio::whereRaw('idUsuario=?',[$tUsuario[0]->idUsuario])->get();


 		Fpdf::AddPage();
        Fpdf::SetFont('Arial','B',16);
        $i=0;
        Fpdf::Cell(40,3*$i,'USUARIO');
    	Fpdf::Cell(50,3*$i,'NOMBRE ');
    	Fpdf::Cell(50,3*$i,'DIRECCION ');
    	Fpdf::Cell(40,3*$i,'TELEFONO ',0,1,'C');
        $i++;
        Fpdf::Cell(40,3*$i,'',0,1,'C');
        Fpdf::Cell(40,3*$i,'',0,1,'C');
        Fpdf::SetFont('Arial','',12);
        foreach ($listaTDirectorio as $key => $value) {
        	Fpdf::Cell(40,3*$i,$value->tUsuario->nombreUsuario);
        	Fpdf::Cell(50,3*$i,$value->nombreCompleto);
        	Fpdf::Cell(50,3*$i,$value->direccion);
        	Fpdf::Cell(40,3*$i,$value->telefono,0,1,'C');
        	$i++;
        }

        //Fpdf::Cell(40,10,'Hello World!');
        // Fpdf::Output();

        $header=['Content-Type' => 'appication/pdf'];
        return response::make(Fpdf::Output(), 200, $header);
	}
}






 ?>