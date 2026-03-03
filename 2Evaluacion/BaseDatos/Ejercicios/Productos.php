<?php

/**
 * Clase entidad Productos.
 * Representa un registro de la tabla productos.
 */
class Productos
{
    // Propiedades privadas: una por cada columna de la tabla.
    private $CODIGOARTICULO;
    private $SECCION;
    private $NOMBREARTICULO;
    private $FECHA;
    private $PAISDEORIGEN;
    private $PRECIO;

    /**
     * Constructor que recibe un array asociativo (normalmente de PDO::fetch).
     * Asigna cada valor del array a su propiedad correspondiente.
     */
    public function __construct($registro)
    {
        $this->CODIGOARTICULO = $registro['CODIGOARTICULO'];
        $this->SECCION = $registro['SECCION'];
        $this->NOMBREARTICULO = $registro['NOMBREARTICULO'];
        $this->FECHA = $registro['FECHA'];
        $this->PAISDEORIGEN = $registro['PAISDEORIGEN'];
        $this->PRECIO = $registro['PRECIO'];
    }

    // Getters y Setters de CODIGOARTICULO.
    public function getCODIGOARTICULO()
    {
        return $this->CODIGOARTICULO;
    }

    public function setCODIGOARTICULO($CODIGOARTICULO)
    {
        $this->CODIGOARTICULO = $CODIGOARTICULO;
    }

    // Getters y Setters de SECCION.
    public function getSECCION()
    {
        return $this->SECCION;
    }

    public function setSECCION($SECCION)
    {
        $this->SECCION = $SECCION;
    }

    // Getters y Setters de NOMBREARTICULO.
    public function getNOMBREARTICULO()
    {
        return $this->NOMBREARTICULO;
    }

    public function setNOMBREARTICULO($NOMBREARTICULO)
    {
        $this->NOMBREARTICULO = $NOMBREARTICULO;
    }

    // Getters y Setters de FECHA.
    public function getFECHA()
    {
        return $this->FECHA;
    }

    public function setFECHA($FECHA)
    {
        $this->FECHA = $FECHA;
    }

    // Getters y Setters de PAISDEORIGEN.
    public function getPAISDEORIGEN()
    {
        return $this->PAISDEORIGEN;
    }

    public function setPAISDEORIGEN($PAISDEORIGEN)
    {
        $this->PAISDEORIGEN = $PAISDEORIGEN;
    }

    // Getters y Setters de PRECIO.
    public function getPRECIO()
    {
        return $this->PRECIO;
    }

    public function setPRECIO($PRECIO)
    {
        $this->PRECIO = $PRECIO;
    }
}
