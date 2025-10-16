<?php
/*Genera un array aleatorio de 33 elementos con números comprendidos entre el 0 y 100 y calcula:
El mayor
El menor
La media
*/
 $miarray=[];
$mayor=0;
$suma=0;
$menor=100;


 for($i=0;$i<33;$i++){                 //$mayor = max($miarray);
    $miarray[$i]=rand(0,100);          //$menor = min($miarray);
    if($miarray[$i]>$mayor){           //$media = array_sum($miarray) / count($miarray)
        $mayor=$miarray[$i];
    }if($miarray[$i]<$menor){
        $menor=$miarray[$i];
    }
    $suma+=$miarray[$i];
    }
 

$media= $suma/ count($miarray);

echo "El numero mayor es $mayor <br>";
echo "La media es $media <br> ";
echo "El numero menor es $menor <br> ";

echo"<br>";
print_r($miarray);
?>