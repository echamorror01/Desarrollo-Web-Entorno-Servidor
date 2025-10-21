
<?php
//rellenar un array de 100 elementos de manera aleatorio de  m y f y una vez completados
//vuelve a recorrerlos y calculas cuantos hay de cada uno de cada de ellos almacenando el resultado 
// en un array asociativo 


$miarray=[];
$valores=["m","f"];
for($i=0;$i<=100;$i++){
    $miarray[$i]=$valores[array_rand($valores)]; //este es del array 
}
print_r($miarray);

?>