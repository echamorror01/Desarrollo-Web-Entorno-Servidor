<?php
//Introducir un numero aleatorio es decir si es un numero primo ( el 1 y el mismo numero )

$num=rand(1,20);
$esprimo=true;

if($num<=1){
    $esprimo=false;
}
//si tiene mas divisores no es primo 
for($i=2;$i<$num;$i++){
    if($num%$i==0){
        $esprimo=false;
        break;
    }
}
if($esprimo){
    echo"$num es un numero primo";

}else{
    echo" $num no es numero primo";
}


?>