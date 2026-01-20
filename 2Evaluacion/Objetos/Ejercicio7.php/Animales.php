<?php
/*Crea las clases Animal, Mamifero, Ave, Gato, Canario, Perro y Pinguino.
Todos los animales tienen las siguientes características:
Un Animal tiene un nombre, un sexo (M/H) y un habitat (agua, tierra, aire tipo String).
Un Animal es una clase base que no se puede instanciar (Abstracta).
Tiene un método abstracto emitirSonido() que muestra un mensaje por pantalla. Implementa el método en cada clase adecuada.
Un Mamimero hereda de Animal.
Un Gato, un Perro son Mamiferos, y además tienen un nombre de raza, número de patas.
Un Mamifero tiene un método amamantar() que muestra un mensaje por pantalla, que debe sobrescrito en Gato y Perro indicando caracteristica especificas de ello.
Gato y Perro no se quiere que se puedan heredar, por lo haz que sean clases finales.
y un Ave hereda de Animal.
Un Pingüino, Canario son Aves, y además tiene un nombre de especie, y un color de plumaje.
Un Ave tiene un método volar() que muestra un mensaje por pantalla, debe sobrescrito en Pinguino y Canario indicando caracteristica especificas de ello.
Todos los animales (cualquier clase) deben tener un método __toString() que devuelva el nombre del animal, sus propiedades características y el sonido que emite. */



enum sexo: string
{
    case Varon = 'V';
    case Hembra = 'H';
   
}
//Para mostrar uno de los enums:
$anim = sexo::Hembra;
print($anim->value);
echo sexo::Hembra->value;

enum habitat: string
{
    case Agua = 'Agua';
    case Tierra = 'Tierra';
    case Aire = 'Aire';
   
}
//Para mostrar uno de los enums:
$habit = habitat::Tierra;
print($habit->value);
echo habitat::Tierra->value;


include "Animal.php";
include "Mamifero.php";
include "Perro.php";
include "Gato.php";
include "Ave.php";
include "Pinguino.php";
include "Canario.php";




//$chihuahua = new Perro("M","Tierra","canina",4);
$chihuahua = new Perro(sexo::Varon->value,"Tierra","canina",4);

//$chihuahua->emitirSonido();
$chihuahua->amamantar();
echo $chihuahua;
echo "<br>";
//print_r($chihuahua);

$siames = new Gato("simaes","F","Tierra","gatuna",4);
//$gatito->emitirSonido();
$siames->amamantar();
echo $siames;
echo "<br>";
//print_r($gatito);

$canarioBelga = new Canario("canarioBelga","M","Aire","avicola","amarillo");
//$gorrion->emitirSonido();
$canarioBelga->volar();
echo ($canarioBelga);
?>




