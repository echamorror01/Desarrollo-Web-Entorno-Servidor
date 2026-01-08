<?php
//Con la funcion file_get_contents

$archivo=fopen("miArchivoPrueba.txt" ,"x+b");

if($archivo){
    fwrite($archivo," Una base de datos es un sistema informático a modo de almacén.



    En este almacén se guardan grandes volúmenes de información.

 

	Por ejemplo, imaginemos que somos una compañía telefónica y deseamos tener almacenados los datos personales y los números de teléfono de todos nuestros clientes, que posiblemente sean millones de personas.");
    fclose($archivo);
    $cadena=file_get_contents("miArchivoPrueba.txt");
    $salto=nl2br($cadena);
    }



?>