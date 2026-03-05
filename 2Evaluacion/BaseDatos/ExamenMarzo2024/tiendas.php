<?php

class Tiendas {
    protected $cod;
    protected $nombre;
    protected $tlf;
   
       
    public function __construct($registro) {
        $this->cod = $registro['cod'];
        $this->nombre = $registro['nombre'];
        $this->tfl = $registro['tlf'];
    }
    
    public function getCod() {
        return $this->dod; 
        
    }
    
    public function getNombre() {
        return $this->nombre; 
        
    }
    
    public function getTlf() {
        return $this->tlf; 
        
    }
    
    
     
}