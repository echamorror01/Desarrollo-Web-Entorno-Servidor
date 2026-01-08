<?php

/*PRÁCTICA FICHEROS 
	La función denominada obtenerArrNum  (tipo función, devolverá un array de valores numéricos) que reciba una ruta de archivo como parámetro, lea los números existentes en cada línea del archivo, y devuelva un array cuyo índice 0 contendrá el número existente en la primera línea, cuyo índice 1 contendrá el número existente en la segunda línea y así sucesivamente. 
Por ejemplo, suponiendo que el archivo "03.-datos.txt", contenga los valores 10,50,30,120,90 (un valor en cada línea del archivo), el resultado sería el siguiente:
 */

function obtenerArrNum(){
    echo "Contenido del array";
    echo '<br>';
   $cadena=file("datos.txt");  //abre y lo lee y no hace falta cerrarlo 
   print_r($cadena);
    
    }

obtenerArrNum();

/*
esto es en un fichero que llamo a la funcion 
<?php
include "03.-funciones.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
<body>
<?php 
    $nombre="03.-datos.txt";
    $contenido=obtenerArrNum($nombre);
    echo "<h2>Contenido del array:</h2>";
    echo "<pre>";
    print_r($contenido);
    echo "</pre>";
?>
		
</body>
</html>	

<?php
Se llama 03.funciones.php  , entonces arriba lo llamo con el include 
function obtenerArrNum($nomb){
    $archivo = fopen($nomb, "r");
    while (!feof($archivo)){
        $arra[]= fgets($archivo);
    }
    fclose($archivo);
    return $arra;
}
?>

*/


?>