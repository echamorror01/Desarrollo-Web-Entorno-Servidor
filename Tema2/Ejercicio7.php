<?php
//Genera numeros aleatorios del 1-12 y dime con que mes corresponde 

$num=rand(1,12);
switch($num){
    case 1;
    echo "El mes $num es  Enero";
    break;
    case 2;
    echo "El mes $num es  Febrero";
    break;
    case 3;
    echo "El mes $num es  Marzo ";
    break;
    case 4;
    echo "El mes $num es  Abril";
    break;
    case 5;
    echo "El mes $num es  Mayo";
    break;
    case 6;
    echo "El mes $num es Junio";
    break;
    case 7;
    echo "El mes $num es Julio";
    break;
     case 8;
    echo "El mes $num es Agosto";
    break;
     case 9;
    echo "El mes $num es Septiembre";
    break;
     case 10;
    echo "El mes $num es Octubre";
    break;
     case 11;
    echo "El mes $num es Noviembre";
    break;
     case 12;
    echo "El mes  $num es Diciembre";
    break;
    default:
    echo"Error";
}

?>