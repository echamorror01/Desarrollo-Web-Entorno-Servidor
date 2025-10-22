
<?php
//rellenar un array de 100 elementos de manera aleatorio de  m y f y una vez completados
//vuelve a recorrerlos y calculas cuantos hay de cada uno de cada de ellos almacenando el resultado 
// en un array asociativo 

$cuentam=0;
$cuentaf=0;
$miarray=[];
$valores=["m","f"];
for($i=0;$i<100;$i++){
    $miarray[$i]=$valores[array_rand($valores)]; //este es del array la función 
}
print_r($miarray);
echo"<br>";
for($i=0;$i<count($miarray);$i++){
    if($miarray[$i]=="m"){
        $cuentam++;
    }else{
        $cuentaf++;
    }
   
}

echo"$cuentam <br> "; 
echo "$cuentaf <br>";
echo"<br>";

 $array=["m"=>$cuentam,"f" =>$cuentaf];

foreach($array as $letra=> $contador){
    echo" De la letra $letra hay $contador <br>";
}
 
 
?>