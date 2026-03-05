<?php

class Stocks {
    protected $producto;
    protected $tienda;
    protected $unidades;
   
       
    public function __construct($registro) {
        $this->producto = $registro['producto'];
        $this->tienda = $registro['tienda'];
        $this->unidades = $registro['unidades'];
    }
    
    public function getProducto() {
        return $this->producto; 
        
    }
    
    public function getTienda() {
        return $this->tienda; 
        
    }
    
    public function getUnidades() {
        return $this->unidades; 
        
    }
    
    
     
}