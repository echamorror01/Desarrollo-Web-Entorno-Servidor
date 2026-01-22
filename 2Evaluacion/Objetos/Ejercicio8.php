<?php

?>

<?php

/* Empleado.php: Crea una clase Empleado con su nombre, apellidos y sueldo. 
Encapsula las propiedades mediante getters/setters y añade métodos para: 
* Obtener su nombre completo →getNombreCompleto(): string 
* Que devuelva un booleano indicando si debe o no pagar impuestos(se pagan cuando el sueldo es superior a 3333€) → debePagarImpuestos(): bool
 */
class Empleado
{
    private string $nombre;
    private string $apellidos;
    private float $sueldo;

    public function __construct(string $nombre, string $apellidos, float $sueldo)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sueldo = $sueldo;
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

}

$Empleado1= new Empleado("Estrella", "Chamorro","4000");
$Empleado2= neW Empleado("Ruben", "Gordillo","3000");

//Resultados
 echo "Empleado 1";
 echo "Nombre" .$Empleado1->getNombre() . "<br>";
 echo "Apellidos" .$Empleado1->getApellidos() . "<br>";
 echo "NombreCompleto" .$Empleado2->getNombreCompleto() . "<br>";
 echo "Pagar impuestos" . $Empleado1->debepagarimpuestos() . "<br>";
