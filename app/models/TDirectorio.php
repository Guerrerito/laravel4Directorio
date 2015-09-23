<?php 
class TDirectorio extends Eloquent{
	protected $table= 'TDirectorio';
	protected $primaryKey='idDirectorio';

	public function tUsuario(){
		return $this->belongsTo('TUsuario','idUsuario');
	}
}


 ?>
