<?php
/*Crear un archivo de texto "10.-Archivo.txt", en  el que
 se guarden al menos tres líneas de texto utilizando la 
 función fwrite(). A continuación, 
 utilizando la función fread() leyendo el bloque completo , 
 lee el archivo y muestra su contenido como se encuentra almacenado.*/

$archivo=fopen("datos.txt","w+b");
if($archivo){
    fwrite($archivo,"Hola" . PHP_EOL);
    fwrite($archivo," Estrella" . PHP_EOL);
    fwrite($archivo,"Soy de Medina de las Torres" . PHP_EOL);

    fclose($archivo);

    echo "Escritura realizada con éxito";
}else{
    echo "Error";
}

echo "<br>";
$archivo=fopen("datos.txt","r+b");
if($archivo){
    $cadena=fread($archivo,filesize("datos.txt"));
echo $cadena;

fclose($archivo);

}
?>