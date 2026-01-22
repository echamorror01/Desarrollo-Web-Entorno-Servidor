<?php

/*EmpleadoTelefonos.php: Copia la clase del ejercicio anterior y modifícala. Añade una propiedad privada que almacene un array de números de teléfonos. Añade los siguientes métodos: 
* public function anyadirTelefono(int $telefono) : void → Añade un teléfono al array 
* public function listarTelefonos(): string → Muestra los teléfonos separados por comas 
* public function vaciarTelefonos(): void → Elimina todos los teléfonos */


class Empleado
{
    private string $nombre;
    private string $apellidos;
    private float $sueldo;
    private array $telefonos=[];

    public function __construct(string $nombre, string $apellidos, float $sueldo,array $telefonos)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sueldo = $sueldo;
        $this->telefonos=$telefonos;
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

    public function getSueldo(): float
    {
        return $this->sueldo;
    }

    public function setSueldo(float $sueldo): self
    {
        $this->sueldo = $sueldo;
        return $this;
    }

    public function getNombreCompleto() : string{
        return "Nombre Completo : " . $this->nombre.  $this->apellidos;

    }
     public function debepagarimpuestos() : bool{
        if($this->sueldo>=3333){
            return true;
        }
        return false;
     }

     public function añadirTelefonos(int $telefono) : void{
        $this->telefonos[]= $telefono;
     }

     public function listartelefonos() : string{
        return implode(",", $this->telefonos);/* pasar un array a string */

     }
     public function vaciartelefonos(): void{
        $this->telefonos=[];

     }

}



?>