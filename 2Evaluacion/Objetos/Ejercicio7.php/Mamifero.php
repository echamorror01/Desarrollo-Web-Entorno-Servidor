

<?php
/*Un Mamimero hereda de Animal.
Un Gato, un Perro son Mamiferos, y además tienen un nombre de raza, número de patas.
Un Mamifero tiene un método amamantar() que muestra un mensaje por pantalla, que debe sobrescrito en Gato y Perro indicando caracteristica especificas de ello.
Gato y Perro no se quiere que se puedan heredar, por lo haz que sean clases finales.
 */
class Mamifero extends Animal
{
    private string $raza;
    private string $patas;

    public function __construct(string $raza, string $patas,string $nombre,string $sexo,string $habitat)
    {
        parent::__construct($nombre,$sexo,$habitat); /* clase padre es Animal por eso llamamos al padre conswtructor de Animal */
        $this->patas = $patas;
        $this->raza=$raza;
        
        
    }
      public function __toString() : string { // Lo que devuelve 
        echo parent::__toString(); 
        $cadena=" <br>Raza: ->".$this->raza;
        $cadena.=" <br>Patas: ->".$this->patas;
        $cadena.=$this->emitirSonido();
        return $cadena;
    }
    public function emitirSonido() : string {
        echo "<br>Emitir sonido Mamifero";
   }

    public function amamantar() : void{
        echo "<br> Amamantar ->";

    }
  
}
?>