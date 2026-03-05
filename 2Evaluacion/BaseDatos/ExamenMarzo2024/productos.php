<?php

class Productos {
    protected $codigo;
    protected $nombre_corto;
    protected $PVP;
    protected $familia;
    
    public function __construct($registro) {
        $this->codigo = $registro['cod'];
        $this->nombre_corto = $registro['nombre_corto'];
        $this->PVP = $registro['PVP'];
        $this->familia = $registro['familia'];
    }
    
    public function getCodigo() {
        return $this->codigo; 
        
    }
    
    public function getNombre() {
        return $this->nombre; 
        
    }
    
    public function getNombreCorto() {
        return $this->nombre_corto; 
        
    }
    
    public function getPVP() {
        return $this->PVP; 
    }

    public function getFamilia() {
        return $this->familia; 
        
    }
     
}