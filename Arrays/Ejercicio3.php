<?php
//Rellena un array con 50 numeros aleatorios comprendidos entre el 0 y el 99 y luego muestralo en una linea
//desordenada. Para crear un número aleatorio, utiliza la funcion rand()

$miarray=[];

for($i=0;$i<50;$i++){
   array_push($miarray,rand(0,99));
}
//shuffle($miarray);
print_r($miarray);

 echo "<ul>";
 foreach($miarray as $numero){   
    echo  "<li> $numero </li>";  //ol para que salga ordenado 
 }
 echo"</ul>";
  

?>