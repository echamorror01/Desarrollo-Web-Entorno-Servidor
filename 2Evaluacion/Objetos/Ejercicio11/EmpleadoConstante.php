<?php
/* EmpleadoConstante.php: Copia la clase del ejercicio anterior y modifícala. Añade una constante SUELDO_TOPE con el valor del sueldo que debe pagar impuestos,
 y modifica el código para utilizar la constante.*/

// this para estatico o global y self para constante , metodo estático , propiedade estáticas
class Empleado
{
    private string $nombre;
    private string $apellidos;
    private float $sueldo;
    const sueldo_tope= 3333;
    public function __construct(string $nombre, string $apellidos, float $sueldo=1000)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sueldo = $sueldo;
     
      
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }



    public function getApellidos(): string
    {
        return $this->apellidos;
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
        return $this->sueldo >= self::sueldo_tope;
     }

    public function __toString(){
        return "Nombre: $this->nombre, <br> Apellidos: $this->apellidos, <br> $this->sueldo 
        , <br> {$this->getNombreCompleto()}, <br> {$this->debepagarimpuestos()}";
        //si le ponemos el metedo ahi no hace falta instanciarlo porque al imprimir el to string sale solo 
    }
}



?>