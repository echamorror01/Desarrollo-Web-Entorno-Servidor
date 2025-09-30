<?php
//Generar un numero aleatorio y decir si es bisiesto o no , divisible entre 4 pero no de 100 pero si multiplos de 4

$num=rand(100,5000);
$esbisiesto=false;

if($num%4==0 && $num%100!=0){
    $esbisiesto=true;
 
}

if($num%400==0){
    $esbisiesto=true;
  
}

if($esbisiesto){
    echo" El año $num  es bisiesto";
}else{
    echo"El año $num no es bisiesto";
}

?>