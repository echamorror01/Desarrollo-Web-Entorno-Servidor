<?Php

class TipoComidas {

	private $codigoTipoComida;
	private $nombreTipoComida;
	
	

	function __Construct ($registro){
		
		$this->codigoTipoComida=  $registro['codigoTipoComida'];
		$this->nombreTipoComida = $registro['nombreTipoComida'];
					
	}

	//Getters	
	function getcodigoTipoComida(){
		return $this->codigoTipoComida;
	}
	function getnombreTipoComida(){
		return $this->nombreTipoComida;
	}
	
	

	}
	
	

?>