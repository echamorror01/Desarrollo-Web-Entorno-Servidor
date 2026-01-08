<?php
/*Juego del calamar.
 Crea un array asociativo, para simular que 10 personas compran un boleto de loteria entre 1-100 números. Cada persona comprará un número aleatorio, y no se pueden repetir.
 El programa debe ejecutarse hasta que haya un único ganador, que será el que quede en pie.
 El programa irá obteniendo números de 1-100, simulando que se extraen del bombo. Si el número extraído coincide con el número de algún jugador, este quedará eliminado, sino se volverá a tirar. Ganará el último Jugador.

Por cada ronda, se mostrará la siguiente información:
Número extraído
Lista de los números extraídos.
No hay jugador con ese número o Jugador eliminado. (Quedan X jugadores)
Al final, se mostrará el jugador ganador y el número del jugador que lo tiene.*/

//Aqui aginamos a cada jugador un numero de boleto 

$jugadores = ["jugador1", "jugador2", "jugador3", "jugador4", "jugador5", "jugador6", "jugador7", "jugador8", "jugador9", "jugador10"];
$numeros = [];

//Relleno el array de números:

while (count($numeros) < 10) {
    $num = rand(1, 100);
    if (!in_array($num, $numeros)) {
        $numeros[] = $num;
    }
}

//Asigno un número a cada jugador
$jugadorNumeros = array_combine($jugadores, $numeros);

//Mostrar
echo "<pre>";
print_r($jugadorNumeros);
echo "</pre>";
$numerosExtraidos = [];

while (count($jugadorNumeros) > 1) {
    $numBombo = rand(1, 100);
    //Guardamos los números que vayan saliendo
    $numerosExtraidos[] = $numBombo;
    echo "<br>Número sacado del bombo: $numBombo<br>";
    $eliminado = false;
    foreach ($jugadorNumeros as $jugador => $numero) {
        if ($numBombo == $numero) {
            echo "JUGADOR ELIMINADO: $jugador tenía el número $numero <br>";

            //elimino el jugador
            unset($jugadorNumeros[$jugador]);
            $eliminado = true;
            break; //paro para no seguir buscando
        }
    }

    if (!$eliminado) {
        echo "No hay ningún jugador con ese número <br>";
    }

    echo "Quedan " . count($jugadorNumeros) . " jugadores<br>";
    echo "Números extraídos: ";
    print_r($numerosExtraidos);
    echo "<br><br>";
}

//Solo queda 1 ganador
$ganador = array_keys($jugadorNumeros)[0];
$numeroGanador = $jugadorNumeros[$ganador];

echo "<br>GANADOR: $ganador con el número $numeroGanador";


?>