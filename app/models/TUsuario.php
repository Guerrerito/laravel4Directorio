<?php 

class TUsuario extends Eloquent{

	protected $table = 'TUsuario';
	protected $primaryKey = 'idUsuario';
	
	public function tDirectorio(){
		return $this->hasMany('TDirectorio','idUsuario');
	}

}
 ?>