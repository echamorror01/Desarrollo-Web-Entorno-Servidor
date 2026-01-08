<?php
/*Crea una función denominada obtenerSuma (tipo función, devolverá un valor numérico) que reciba una ruta de archivo como parámetro, 
lea los números existentes en cada línea del archivo, y devuelva la suma de todos esos números. Por ejemplo, 
la suma del contenido del archivo "02.-datos.text" podría ser la siguiente:
La suma total del contenido del fichero 02-datos.txt es:90
 */

function obtenersuma($ruta){

    $suma=0;
   $cadena=file($ruta);  //abre y lo lee y no hace falta cerrarlo 
   foreach($cadena as $num){    //feof hasta el final del array 
    $suma+=(int)$num;  //suma
   }
    echo"La suma total del contenido del fichero $ruta es : $suma"; 
   
    }


obtenersuma("datos.txt");


?>