<?php
//Dados los siguientes arrays, combinalos en un único array plano, intercalando los elementos de ambos. Muestra el resultado por pantalla. Si un array 
// tiene más elementos que otro, 
// añade los elementos restantes al final 
// del array resultante. (Hazlo sin utilizar ninguna función de PHP)
//[1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
//['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j']

$array1=[1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$array2=['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j',"m"];
$arrayfinal=[];

$lon1=count($array1);
$lon2=count($array2);

if($lon1>$lon2){
    $max=$lon1;
}else{
    $max=$lon2;
}
for($i=0;$i<$max;$i++){
    if($i<$lon1){
        array_push($arrayfinal,$array1[$i]);
    }
    if($i<$lon2){
       array_push($arrayfinal,$array2[$i]);
    }
 
    }
print_r($arrayfinal);

?>