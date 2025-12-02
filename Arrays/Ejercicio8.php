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
$miarray=[];
for($i=0;$i<10;$i++){
    $boleto= rand(1,100);
    //para que no se repitan 
while(in_array($boleto,$miarray)){ //si el numero ya está en el array se genera otro 
    $boleto= rand(1,100);

}
    $miarray["jugador" . ($i + 1 )]=$boleto;
}
echo "Números asignados a los jugadores : <br>";
print_r($miarray);

//función
function jugar(){
    global $miarray; //lo usamos global para que me sirva
    $numerosExtraidos= [];
    $jugadoresrestantes=count($miarray); //contador de jugadores
     while($jugadoresrestantes>1){
        $numeroExtraido=rand(1,100); // extraemos el numero 
        echo "Numero extraido $numeroExtraido <br>";

        if(!in_array($numeroExtraido,$numerosExtraidos)){ // si en el array no está el numero lo extraemos 
            $numerosExtraidos[]=$numeroExtraido;
            $jugadoreliminado=null;

            foreach($miarray as $jugador => $numero){
                if($numero==$numeroExtraido){ // si el numero coincide hya que buscare
                    $jugadoreliminado=$jugador;
                    break;
                }
            }
            if($jugadoreliminado!==null){ // significa que hemos encontrado un jugador y hay que eliminarlo 
                unset($miarray[$jugadoreliminado]);// eliminamos el jugador
                echo "Jugador $jugadoreliminado eliminado (Numero: $numeroExtraido) <br>";
                 $jugadoresrestantes = count($miarray);
            }else{
                echo "No hay jugador con ese numero <br>";
              

            }
              
            echo "Quedan $jugadoresrestantes jugadores.<br>";
            echo "-------------------------<br>";
        }
     }
      $jugadorGanador = key($miarray);  // devuelve la clave del primer elemento del array 
    echo "¡El jugador $jugadorGanador es el ganador con el número: " . current($miarray) . "!\n";  // current devuelve el valor es decir el numero


}

jugar()
?>