<?php

/*Persona.php: Copia la clase del ejercicio anterior en 
Empleado.php y modifícala. Crea una clase Persona que sea 
padre de Empleado, de manera que Persona contenga el nombre y 
los apellidos,
y en Empleado quede el salario y los teléfonos. */

class Empleado
{
    private string $nombre;
    private string $apellidos;
    private float $sueldo;
    private static $sueldotope = 3333;
    private array $telefonos=[];

    //variable estática
    public function __construct(string $nombre, string $apellidos,float $sueldo,array $telefonos=[])
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sueldo = $sueldo;
        $this->telefonos=$telefonos;
    }

    public function getNombreCompleto(): string
    {
        return "Nombre Completo : " . $this->nombre . $this->apellidos;
    }

    public function debepagarimpuestos(): bool
    {
        return $this->sueldo >= self::$sueldotope;
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

    public  function setSueldo(float $sueldo): self
    {
        $this->sueldo = $sueldo;
        return $this;
    }
// medtodos estáticos se usa el self 
    public static function getSueldotope(): float
    {
        return self::$sueldotope;
    }

    public static function setSueldotope(float $nuevotope)
    {
        self::$sueldotope = $nuevotope;
        
    }

    // getters y setters del telefono
    public function getTelefonos(): array{
        return $this-> telefonos;
    }
      public function añadirTelefono(string $telefono): void {
        $this->telefonos[] = $telefono;
    }

    public static function HTML(Empleado $emp): string{
     $html = "<p>"; 
     $html .= "Nombre: {$emp->getnombre()} 
     {$emp->getapellidos()}<br>";
     $html .= "Sueldo: 
     {$emp->getsueldo()}"; 
     $html .= "</p>";
      $html .= 
     "<ol>"; 
     foreach ($emp->getTelefonos() as $telefono) 
        { $html .= "<li>$telefono</li>"; } 
     $html .= "</ol>";
      return $html; 
      }
}

?>