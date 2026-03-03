<?php

class Productos {

    // Una variable privada por cada columna de la tabla
    private $CodigoArticulo;
    private $Seccion;
    private $NombreArticulo;
    private $Fecha;
    private $PaisdeOrigen;
    private $Precio;

    // El constructor recibe la fila que devuelve PDO y guarda cada valor
    public function __construct($registro) {
        $this->CodigoArticulo = $registro['CODIGOARTICULO'];
        $this->Seccion        = $registro['SECCION'];
        $this->NombreArticulo = $registro['NOMBREARTICULO'];
        $this->Fecha          = $registro['FECHA'];
        $this->PaisdeOrigen   = $registro['PAISDEORIGEN'];
        $this->Precio         = $registro['PRECIO'];
    }

    // --- GETTERS: para leer los valores desde fuera de la clase ---
    public function getCodigoArticulo() { return $this->CodigoArticulo; }
    public function getSeccion()        { return $this->Seccion; }
    public function getNombreArticulo() { return $this->NombreArticulo; }
    public function getFecha()          { return $this->Fecha; }
    public function getPaisdeOrigen()   { return $this->PaisdeOrigen; }
    public function getPrecio()         { return $this->Precio; }

    // --- SETTERS: para modificar los valores desde fuera de la clase ---
    public function setCodigoArticulo($v) { $this->CodigoArticulo = $v; }
    public function setSeccion($v)        { $this->Seccion = $v; }
    public function setNombreArticulo($v) { $this->NombreArticulo = $v; }
    public function setFecha($v)          { $this->Fecha = $v; }
    public function setPaisdeOrigen($v)   { $this->PaisdeOrigen = $v; }
    public function setPrecio($v)         { $this->Precio = $v; }
}
?>
