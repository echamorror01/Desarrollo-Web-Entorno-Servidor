<?php
//Introducir tres numeros entre el 1 y el 10 aleatorios y presentarlos en pantalla de forma ordenada 

$num1=rand(1,10);
$num2=rand(1,10);
$num3=rand(1,10);
$mayor=0;
$menor=0;
$mediano=0;

// mayor//
if($num1>$num2 && $num1>$num3){
    $mayor=$num1;
}elseif($num2>$num1 && $num2>$num3){
    $mayor= $num2;
}else{
    $mayor=$num3;
}

//mediano
if($num1>$num2 && $num1<$num3 ||$num1 < $num2 && $num1 > $num3 ){
    $mediano=$num1;
    }elseif($num2>$num1 && $num2<$num3 ||$num2 < $num1 && $num2 > $num3 ){
    $mediano= $num2;
}else{
    $mediano=$num3;
}

//minimo 
if($num1<$num2 && $num1<$num3){
    $menor=$num1;
    }elseif($num2<$num1 && $num2<$num3){
    $menor= $num2;
}else{
    $menor=$num3;
}

echo"Los numeros son : $num1 , $num2, $num3";
echo"<br> Los numeros ordenados son : $menor , $mediano, $mayor";

?>