<?php

class Frutas
{
    private $nombreFruta;
    private $votos;

    public function __construct($nombreFruta, $votos)
    {
        $this->nombreFruta = $nombreFruta;
        $this->votos = $votos;
    }

    public function getNombreFruta()
    {
        return $this->nombreFruta;
    }

    public function setNombreFruta($nombreFruta)
    {
        $this->nombreFruta = $nombreFruta;
        return $this;
    }

    public function getVotos()
    {
        return $this->votos;
    }

    public function setVotos($votos)
    {
        $this->votos = $votos;
        return $this;
    }
}