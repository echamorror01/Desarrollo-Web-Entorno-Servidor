<?php
//Introducir un numero aleatorio del 1-7 el dia de la semana 
$num=rand(1,7);
switch($num){
    case 1;
    echo "El dia de la semana $num es el Lunes";
    break;
    case 2;
    echo "El dia de la semana $num es el Martes";
    break;
    case 3;
    echo "El dia de la semana $num es el Miercoles";
    break;
    case 4;
    echo "El dia de la semana $num es el Jueves";
    break;
    case 5;
    echo "El dia de la semana $num es el Viernes";
    break;
    case 6;
    echo "El dia de la semana $num es el Sabado";
    break;
    case 7;
    echo "El dia de la semana $num es el Domingo";
    break;
    default:
    echo"Error";
}

?>