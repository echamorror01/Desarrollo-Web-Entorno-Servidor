<?php
//Generar 3 numeros al azar y ver cual es el mayor de los tres 
$mayor=0;
for($i=1; $i<=3; $i++){
    $numero=rand(1,50);
    echo" El numero  $numero <br>";
   
    if($numero>$mayor){;
        $mayor= $numero;
       
    }
     
}
echo"<br>";
echo"El numero mayor es " .$mayor;
?>