<?php

/* EmpleadoSueldo.php: Copia la clase del ejercicio anterior y modifícala. Cambia la constante 
por una variable estática sueldoTope, de manera
que mediante getter/setter puedas modificar su valor*/

class Empleado
{
    private string $nombre;
    private string $apellidos;
    private float $sueldo;
    private static $sueldotope = 3333;

    //variable estática
    public function __construct(string $nombre, string $apellidos,float $sueldo)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sueldo = $sueldo;
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

    public function __toString(): string
    {
        return "Nombre: {$this->nombre}<br>
                Apellidos: {$this->apellidos}<br>
                Sueldo: {$this->sueldo}<br>
                {$this->getNombreCompleto()}<br>
                Paga impuestos: " . ($this->debepagarimpuestos() ? 'Sí' : 'No') . "<br>"."Sueldo Tope: " . self::$sueldotope;
    }
}