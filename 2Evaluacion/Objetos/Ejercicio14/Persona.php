<?php

class Persona
{
    private string $nombre;
    private string $apellidos;

    public function __construct(string $nombre, string $apellidos)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;
        return $this;
    }
    
}