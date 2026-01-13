<?php

/* 4.- Diseña un programa Php que trabaje con la clase Alumno del ejercicio 3, copiándola y pegándola en este. Crea otra clase llamada GestionAlumnos con las siguentes características:
Atributos: array de 25 Alumnos
Métodos:
llenarArray, llena el array de alumnos con datos.
mostrarAlumnos, muestra en pantalla cada alumno y su nota media.

5️⃣ Conceptos clave

$this:	Se refiere al objeto actual, se usa dentro de la clase para acceder a atributos y métodos
Métodos	Funciones dentro de la clase. Pueden ser de instancia ($this) o estáticos (self::)
Array de objetos:	$this->lista[] = $alumno; agrega objetos Alumno al array
Encapsulación	Los atributos son private y solo se acceden mediante getters y setters
*/
class GestionAlumnos
{
    private $lista = []; //lo ponemos vacio 
 
    public function __construct() 
    {
        $this->lista = [];
    }

    public function getLista()
    {
        return $this->lista;
    }

    public function setLista($lista)
    {
        $this->lista = $lista;
        return $this;
    }
    public function llenarArray(){
        for($i=0;$i<=25;$i++){
        $numeroExpediente=100+ $i;
        $nombre="Alumno" .$i;
        $apellidos="Apellidos".$i;
        $fecha="2025-01-01";
        $curso="1ºEso";
        $nota1=rand(0,10);
        $nota2=rand(0,10);

        $alumno= new Alumno($numeroExpediente,$nombre,$apellidos,$fecha,
        $curso,$nota1,$nota2);
        $this->lista[]=$alumno; //agregamos al array 
        }
    }
    public function mostrarAlumno(){
        foreach($this->lista as $datos){ //recorremos el arry 
        echo $datos->devolver(). "<br>"; //lo mostramos con la funcion que creamos de devolver 
        }
    }

}

$gestion= new GestionAlumnos();
$gestion->llenarArray();
$gestion->mostrarAlumno();

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
        return $this->numeroExpediente; //this se refiere al objeto actual
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
$alumno1 = new Alumno( "169",  "Estrella",  "Chamorro",  "2002-09-01",  "2º ESO",  "7",  "8");
$alumno2 = new Alumno( "170",  "Juan",  "Pérez",  "2001-05-12",  "1º Bachillerato",  "5",  "8");

// Probamos los métodos
echo "Alumno 1:<br>";
echo "Nombre: " . $alumno1->getNombre() . "<br>";
echo "Curso: " . $alumno1->getCurso() . "<br><br>";
echo "Alumno 2:<br>";
echo "Nombre: " . $alumno2->getNombre() . "<br>";
echo "Curso: " . $alumno2->getCurso() . "<br>";
echo "Media de las notas" . $alumno1->medianotas() . "<br>";
echo $alumno2->devolver();

// Probamos un setter
$alumno1->setCurso("3º ESO");
echo "<br>Curso actualizado del alumno 1: " . $alumno1->getCurso();