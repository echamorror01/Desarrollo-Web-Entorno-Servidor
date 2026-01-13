<?php

/*3.- En un nuevo proyecto, copia la clase Alumno del ejercicio 1, y:

Añade dos atributos que almacenen sendas notas.
Crea los métodos get/set correspondientes, modifica también el constructor para que incluya estas notas.
Crea un método que devuelva la media de las notas.
Crea un método que devuelva número de expediente, nombre y nota media
 */
class Alumno
{
    private $numeroExpediente;
    private $nombre;
    private $apellidos;
    private $fechaNacimiento;
    private $curso;
    private $nota1;
    private $nota2;

    // Constructor
    public function __construct($numeroExpediente, $nombre, $apellidos, $fechaNacimiento, $curso, $nota1, $nota2)
    {
        $this->numeroExpediente = $numeroExpediente;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->curso = $curso;
        $this->nota1 = $nota1;
        $this->nota2 = $nota2;
    }

    public function getNumeroExpediente()
    {
        return $this->numeroExpediente;  //this se refiere al objeto actual 
    }

    public function setNumeroExpediente($numeroExpediente)
    {
        $this->numeroExpediente = $numeroExpediente;
        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
        return $this;
    }

    public function getCurso()
    {
        return $this->curso;
    }

    public function setCurso($curso)
    {
        $this->curso = $curso;
        return $this;
    }

    public function getNota1()
    {
        return $this->nota1;
    }

    public function setNota1($nota1)
    {
        $this->nota1 = $nota1;
        return $this;
    }

    public function getNota2()
    {
        return $this->nota2;
    }

    public function setNota2($nota2)
    {
        $this->nota2 = $nota2;
        return $this;
    }

    public function medianotas(){
        return ($this->nota1+$this->nota2)/2;  //accede a la primera y segunda  nota 
    }

    public function devolver(){
        return $this->numeroExpediente . "-" . $this->nombre . "Nota media: " . $this->medianotas();
    }
}

// Instanciamos varios objetos
$alumno1 = new Alumno( "169",  "Estrella",  "Chamorro",  "2002-09-01",  "2º ESO","7","8");
$alumno2 = new Alumno( "170",  "Juan",  "Pérez",  "2001-05-12",  "1º Bachillerato","5","8");

// Probamos los métodos
echo "Alumno 1:<br>";
echo "Nombre: " . $alumno1->getNombre() . "<br>";
echo "Curso: " . $alumno1->getCurso() . "<br><br>";
echo "Alumno 2:<br>";
echo "Nombre: " . $alumno2->getNombre() . "<br>";
echo "Curso: " . $alumno2->getCurso() . "<br>";
echo "Media de las notas" .$alumno1 -> medianotas() ."<br>";
echo $alumno2->devolver();

// Probamos un setter
$alumno1->setCurso("3º ESO");
echo "<br>Curso actualizado del alumno 1: " . $alumno1->getCurso();