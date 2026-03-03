<?Php

class Comidas {

	private $CodigoComida;
	private $NombreComida;
	private $descripcionComida;
	private $precioComida;
	private $codigoTipoComida;

	
	
	

	function __Construct ($registro){
		
		$this->CodigoComida=  $registro['codigoComida'];
		$this->NombreComida = $registro['nombreComida'];
		$this->descripcionComida = $registro['descripcionComida'];
		$this->precioComida = $registro['precioComida'];
		$this->codigoTipoComida = $registro['codigoTipoComida'];
			
	}

	//Getters	
	function getcodigoComida(){
		return $this->CodigoComida;
	}
	function getnombreComida(){
		return $this->NombreComida;
	}
	function getdescripcionComida(){
		return $this->descripcionComida;
	}
	function getprecioComida(){
		return $this->precioComida;
	}
	function getcodigoTipoComida(){
		return $this->codigoTipoComida;
	}
	
	

	

}
	
	

?>