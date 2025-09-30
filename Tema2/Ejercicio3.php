<?php
//Genera numeros enteros entre el 1-100 y muestra cuantos hay positivos y cuantos negativos
$contadorpares=0;
$contadorimpares=0;
$cuentapositivos=0;
$cuentanegativos=0;
$sumapares=0;
$sumaimpares=0;

for($i=1;$i<=10;$i++){
   $numero=rand(-100,100);
   if(($numero%2)==0){
    echo"<br> es par ". $numero;
    $contadorpares++;
    $sumapares= $sumapares + $numero;

   }else
   echo"<br> es impar $numero";  // esto es otra forma de concadenar 

   $contadorimpares++;
   $sumaimpares= $sumaimpares + $numero;

   if($numero>0){
     echo"<br> es positivo" . $numero;
     $cuentapositivos++;
   }elseif($numero<0){
    echo"<br> es negativo" . $numero;
    $cuentanegativos++;
   }else{
    echo"Cero";
     
   }
   }

echo"<br><br>";
echo"La cantidad de numeros pares es : " . $contadorpares;
echo"<br>";
echo"La cantidad de numeros impares es : " . $contadorimpares;
echo"<br>";
echo"La suma de los numeros pares es " . $sumapares;
echo"<br>";
echo"La suma de los numeros impares es " . $sumaimpares;
echo"<br>";
echo"La cantidad de  numeros positivos es " . $cuentapositivos;
echo"<br>";
echo"La cantidad de numeros negativos es " . $cuentanegativos;
?>
