<?php

/*Crear un archivo de texto "11.-Archivo.txt", en  el que se guarden 
al menos tres líneas de texto utilizando la función fwrite().
 A continuación, utilizando la función fread() leyendo carácter a 
 carácter , lee el archivo y
  muestra su contenido como se encuentra almacenado
 */

$archivo=fopen("datos.txt","w+b");
if($archivo){
    fwrite($archivo,"Hola" . PHP_EOL);
    fwrite($archivo," Adios" . PHP_EOL);
    fwrite($archivo,"que tal " . PHP_EOL);

    fclose($archivo);

    echo "Escritura realizada con éxito";
}else{
    echo "Error";
}

echo "<br>";


$archivo=fopen("datos.txt","r+b");
if($archivo){
//cuando llega la final se produce el false y termina
while(($cadena=fgetc($archivo))!==false){ //para sacar caracter a caracter
    
echo $cadena;
}
fclose($archivo);



}else{
    echo "Error";
}

?>