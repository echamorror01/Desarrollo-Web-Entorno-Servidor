<?php
/*Una función (tipo procedimiento, no hay valor devuelto)
 denominada leerContenidoFichero que reciba como parámetro la ruta del fichero y muestre por pantalla el contenido de cada una de las líneas del fichero. Utiliza las funciones  fwrite(),fread()
 */
function leerContenidoFichero($ruta){
    $archivo=fopen($ruta,"rb");
    while(!feof($archivo)){ /* funcion de final de fichero */
    $cadena=fread($archivo,1);/* caracter a caracter*/
    echo $cadena;
    } 
    fclose($archivo);
}

function escribircontenido($ruta){
    $archivo=fopen($ruta,"w+b");
    $texto="Estamos probando";
    fwrite($archivo,$texto . PHP_EOL);
     fwrite($archivo, "el uso de archivos" . PHP_EOL);
     fclose($archivo);
}

leerContenidoFichero("datos.txt");
escribircontenido("datos.txt");

?>