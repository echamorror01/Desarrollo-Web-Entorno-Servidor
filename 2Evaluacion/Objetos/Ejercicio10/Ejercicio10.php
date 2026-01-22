<?php

/*EmpleadoConstructor.php: Copia la clase del ejercicio anterior y modifícala. 
Elimina los setters de nombre y apellidos, de manera que dichos datos se asignan mediante el constructor (utiliza la sintaxis de PHP7). 
Si el constructor recibe un tercer parámetro, será el sueldo del Empleado. 
Si no, se le asignará 1000€ como sueldo inicial.
EmpleadoConstructor8.php`: Modifica la clase y
 utiliza la sintaxis de PHP 8 de promoción de las propiedades del constructor.
 */
class Empleado
{
    private string $nombre;
    private string $apellidos;
    private float $sueldo;

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
        if($this->sueldo>=3333){
            return true;
        }
        return false;
     }

    public function __toString(){
        return "Nombre: $this->nombre, <br> Apellidos: $this->apellidos, <br> $this->sueldo 
        , <br> {$this->getNombreCompleto()}";
        //si le ponemos el metedo ahi no hace falta instanciarlo porque al imprimir el to string sale solo 
    }
}

?>