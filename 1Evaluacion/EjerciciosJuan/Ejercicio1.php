<?php
//Crear una funcion con un array inventado y que devuelva el array 

function rellenararray(){
$miarray=[4,6,3,9,8,5,2,3,4];
 return $miarray;

}

function mostrararray(){
 $rdo= rellenararray();
print_r($rdo);
}
 mostrararray();
?>