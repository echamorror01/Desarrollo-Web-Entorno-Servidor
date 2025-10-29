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


$puntos=[
    1=>11,
    2=>0,
    3=>10,
    4=>0,
    5=>0,
    6=>0,
    7=>0,
    10=>2,
    11=>3,
    12=>4
];
$palos=["oro","copas","espada","bastos"];
$arraysinrepetir=[];

$total=0;

echo "<h2>Cartas elegidas:</h2>";

while(count($arraysinrepetir) <10){
    $numeros=array_rand($puntos);//clave
    $palo=$palos[array_rand($palos)]; //para que nos devuelva oro,copas...
    $carta = $numeros . $palo;
    if(!in_array($carta,$arraysinrepetir)){  //sin en el array no esta 
        array_push($arraysinrepetir,$carta);
        $total+=$puntos[$numeros]; //me da la puntuacion(valor)
        echo '<div style="display: inline-block; margin: 10px; text-align: center;">';   // para darle estilo a las cartas
        echo"<p> $numeros de $palo ( $puntos[$numeros]  puntos)</p>";
        
        echo '<img src="img/'.$numeros.$palo.'.png"alt="Carta" style="width: 80px; height: auto;">';
    }
    
    
      echo "</div>";   
    }

echo"<h2>Total de puntos : $total  </h2>";

?>