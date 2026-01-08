<?php
//Generar un numero aleatorio entre 1-10 y que genere el factorial 

$num=rand(1,10);
$factorial=1;

for($i=1;$i<=$num;$i++){  //lo ponemos en el dos mejor si queremos para ahorrarnos una vuelta 
    $factorial=$factorial *$i;
    
}

echo" El factorial del numero " . $num." es :" . $factorial;
// echo "El factorial del numero $num es $factorial"


?>