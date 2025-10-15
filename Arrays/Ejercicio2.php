<?php
// Teniendo en cuenta el siguiente array: 
//Agrega el numero 10 al final del array y muestra el resultado
//Agrega el numero 0 al principio del array y muestra el resultado 
//Agrega el numero 11 en la posicion 3 del array y muestra el resultado
//Reemplaza el numero en la posición 5 por el numero 50 y muestra el resultado

$miarray=[1,2,4,5,6,7,8,9];
$num=10;
array_push($miarray,$num);
print_r($miarray);

echo"<br>";
array_splice($miarray,0,0,0);
print_r($miarray);

echo"<br>";
array_splice($miarray,3,0,11);
print_r($miarray);

echo"<br>";
$miarray[5]=50;
print_r($miarray);

array_splice()
?>