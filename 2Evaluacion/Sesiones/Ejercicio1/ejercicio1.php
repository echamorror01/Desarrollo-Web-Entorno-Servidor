<?php
/* Generar un array de 10 numeros enteros y almacenarlos en una variable sesion */

session_start();
//Crear un array de 10 numeros
$_SESSION["numeros"]=[1,2,3,4,5,6,7,8,9,10];

echo "<pre>";
print_r($_SESSION["numeros"]);
echo "</pre>";

?>