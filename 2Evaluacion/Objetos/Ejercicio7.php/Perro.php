<?php



/*Un Mamifero hereda de Animal.
Un Gato, un Perro son Mamiferos, y además tienen un nombre de raza, número de patas.
Un Mamifero tiene un método amamantar() que muestra un mensaje por pantalla, que debe sobrescrito en Gato y Perro indicando caracteristica especificas de ello.
Gato y Perro no se quiere que se puedan heredar, por lo haz que sean clases finales.*/

 final class Perro extends Mamifero{

  public function amamantar() : void {
        parent::amamantar();
        echo "Soy un Perro";
    }
    public function emitirSonido() : string {
        parent::emitirSonido();
        echo " GUAU";
    }
} 


?>