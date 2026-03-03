<?Php

class Carritos {

	private $codigoCarrito;
	private $nombreCarrito;
	private $descripcionCarrito;
	private $precioCarrito;
	private $codigoTipoCarrito;
	private $cantidadCarrito;
	private $clienteCarrito;

	

	function __Construct ($registro){
		
		$this->codigoCarrito=  $registro['codigoCarrito'];
		$this->nombreCarrito = $registro['nombreCarrito'];
		$this->descripcionCarrito = $registro['descripcionCarrito'];
		$this->precioCarrito = $registro['precioCarrito'];
		$this->codigoTipoCarrito = $registro['codigoTipoCarrito'];
		$this->cantidadCarrito = $registro['cantidadCarrito'];
		$this->clienteCarrito = $registro['clienteCarrito'];
			
	}

	//Getters	
	function getcodigoCarrito(){
		return $this->codigoCarrito;
	}
	function getnombreCarrito(){
		return $this->nombreCarrito;
	}
	function getdescripcionCarrito(){
		return $this->descripcionCarrito;
	}
	function getprecioCarrito(){
		return $this->precioCarrito;
	}
	function getcodigoTipoCarrito(){
		return $this->codigoTipoCarrito;
	}
	
	function getcantidadCarrito(){
		return $this->cantidadCarrito;
	}
	function getclienteCarrito(){
		return $this->clienteCarrito;
	}


}
	
	

?>