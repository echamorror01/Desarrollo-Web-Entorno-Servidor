<?php
//Genera numeros enteros entre el 1-100 y muestra cuantos hay pares
// e impares  y diga la suma de cada uno ( añadimos con todos los numeros )

$contadorpares=0;
$contadorimpares=0;
$sumapares=0;
$sumaimpares=0;

for($i=1;$i<=10;$i++){
   $numero=rand(1,100);
   
   if(($numero%2)==0){
    echo"<br> es par ". $numero;
    $contadorpares++;
    $sumapares= $sumapares + $numero;

   }else
   echo"<br> es impar $numero";  // esto es otra forma de concadenar 
   $contadorimpares++;
   $sumaimpares= $sumaimpares + $numero;
}
echo"<br><br>";
echo"La cantidad de numeros pares es : " . $contadorpares;
echo"<br>";
echo"La cantidad de numeros impares es : " . $contadorimpares;
echo"<br>";
echo"La suma de los numeros pares es " . $sumapares;
echo"<br>";
echo"La suma de los numeros impares es " . $sumaimpares;
?>