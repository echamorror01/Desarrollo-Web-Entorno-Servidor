<?php
//Generar numeros primos entre el 1-100
$num=rand(1,100);
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