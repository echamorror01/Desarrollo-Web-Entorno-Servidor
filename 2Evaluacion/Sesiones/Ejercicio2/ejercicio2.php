<?php
//Generar 10 numeros de un array al azar

session_start();
if(!isset($_SESSION["numeros"])){
    $array=[];
    for ($i=0; $i <10 ; $i++) { 
        $array[]= rand(1,10);
    }
    $_SESSION["numeros"]= $array;
}else{
    $array=$_SESSION["numeros"];
}

print_r($array);



?>