<?php
/* 2.- Crea un nuevo proyecto en el que copies la clase Alumno del ejercicio 1 
y modifícala añadiendo un atributo estático que almacene el número de 
objetos de esta clase que se instancian (que se crean). 
El atributo debe ser también privado. Crea un método que 
permita acceder al valor de ese atributo.*/
class Alumno {
    private $numeroExpediente;
    private $nombre;
    private $apellidos;
    private $fechaNacimiento;
    private $curso;
    private  static $numeroclase=0;

    // Constructor
    public function __construct($numeroExpediente, $nombre, $apellidos, $fechaNacimiento, $curso) {
        $this->numeroExpediente = $numeroExpediente;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos; 
        $this->fechaNacimiento = $fechaNacimiento;
        $this->curso = $curso;
        self::$numeroclase++; //para incrementarlo cuando se cree un objeto 
    }

    // Getters
    public function getNumeroExpediente() {
        return $this->numeroExpediente;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    public function getCurso() {
        return $this->curso;
    }

    // Setters
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
    }

    public static function getNumeroObjetos(){
        return self::$numeroclase;
    }

}

// Instanciamos varios objetos
$alumno1 = new Alumno("169", "Estrella", "Chamorro", "2002-09-01", "2º ESO");
$alumno2 = new Alumno("170", "Juan", "Pérez", "2001-05-12", "1º Bachillerato");

// Probamos los métodos
echo "Alumno 1:<br>";
echo "Nombre: " . $alumno1->getNombre() . "<br>";
echo "Curso: " . $alumno1->getCurso() . "<br><br>";

echo "Alumno 2:<br>";
echo "Nombre: " . $alumno2->getNombre() . "<br>";
echo "Curso: " . $alumno2->getCurso() . "<br>";

// Probamos un setter
$alumno1->setCurso("3º ESO");
echo "<br>Curso actualizado del alumno 1: " . $alumno1->getCurso();
echo "<br>Número de objetos de Alumno: " . Alumno::getNumeroObjetos();
?>


