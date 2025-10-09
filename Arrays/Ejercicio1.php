<?php
//Escribe un programa que genere 20 numeros aleatorios entre 0-100
//y que lo almacenene en un array mostrar los numeros pares delante 
$miarray = array();
$arraypar=array();
$arrayimpar=array();

for($i=0;$i<=20;$i++){
    $num=rand(1,100);
  array_push($miarray,$num);
  }
  for($i=0;$i<=20;$i++){  //count(miarray) funcion que determina el ultimo 
    if($miarray[$i]%2==0){
        array_push($arraypar,$miarray[$i]);
  
    }else{
         array_push($arrayimpar,$miarray[$i]);
     
    }
  }
  for($i=0;$i<count($arraypar);$i++){
    echo " Los numeros pares $arraypar[$i]<br>";
  }
  
for($i=0;$i<count($arrayimpar);$i++){
  echo"  Los numeros impares $arrayimpar[$i]<br>";
}


?>