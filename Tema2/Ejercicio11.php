<?php
//Calcular la serie de fibonacci  dando el 0 y el 1 calcular hasta el numero 11
$num1=0;
$num2=1;
$suma= $num1 + $num2;
echo"$num1 $num2";

for($i=3;$i<=11;$i++){
    $resultado= $num1 + $num2;
    echo" $resultado";
    $suma+= $resultado; 
    $num1= $num2; //actualizamos 
    $num2= $resultado;

}
    echo"<br> La suma de los 11 primeros numeros es $suma";
?>