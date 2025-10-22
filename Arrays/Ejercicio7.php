<?php
/*
Realiza un programa escoja al azar 10 cartas de la baraja española y que diga cuántos puntos suman
según el juego de la brisca.Emplea un array asociativo para obtener los puntos a partir del nombre de la carta
As=11 puntos
Tres=10puntos 
Rey=4 puntos
Caballo=3puntos
Sota:2 puntos
Cartas del 2 al 7: 0puntos
*/

$barajaespañola=[
"oros"=>[ 1=> "As",2=>2 ,3=>3,4=>4,5=>5,6=>6,7=>7,10=>"Sota",11=>"Caballo",12=>"Rey"

],
 "copas"=>[ 1=> "As",2=>2 ,3=>3,4=>4,5=>5,6=>6,7=>7,10=>"Sota",11=>"Caballo",12=>"Rey"
],
 "espadas"=>[ 1=> "As",2=>2 ,3=>3,4=>4,5=>5,6=>6,7=>7,10=>"Sota",11=>"Caballo",12=>"Rey"
],
 "bastos"=>[ 1=> "As",2=>2 ,3=>3,4=>4,5=>5,6=>6,7=>7,10=>"Sota",11=>"Caballo",12=>"Rey"
 ]
];

print_r($barajaespañola)


?>