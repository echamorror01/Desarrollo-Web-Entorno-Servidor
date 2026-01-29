<?php

include_once "Persona.php";
/*306EmpleadoStatic.php: Copia la clase del ejercicio anterior y modifícala. Completa el siguiente método con una cadena HTML que muestre los datos de un empleado dentro de un párrafo y todos los teléfonos mediante una lista ordenada (para ello, deberás crear un getter para los teléfonos):
 * public static function toHtml(Empleado $emp): string */
class Empleado extends Persona
{
    private float $sueldo;
   
    private array $telefonos=[];

    //variable estática
    public function __construct($nombre,$apellidos,float $sueldo,array $telefonos=[])
    {
        parent::__construct( $nombre,  $apellidos); //porque estamos llamando al padre 
        $this->sueldo = $sueldo;
        $this->telefonos=$telefonos;
    }

    
    public function getSueldo(): float
    {
        return $this->sueldo;
    }

    public  function setSueldo(float $sueldo): self
    {
        $this->sueldo = $sueldo;
        return $this;
    }

    // getters y setters del telefono
    public function getTelefonos(): array{
        return $this-> telefonos;
    }
      public function añadirTelefono(string $telefono): void {
        $this->telefonos[] = $telefono;
    }

}


?>