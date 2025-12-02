<?php

//Crear un archivo de texto "09.-Archivo.txt", en  el que se guarden al menos 
// tres líneas de texto utilizando la función fwrite().
//  A continuación, utilizando la función fread() leyendo carácter a carácter , 
// lee el archivo y muestra su contenido como se encuentra almacenado

$archivo=fopen("datos.txt","w+b");
if($archivo){
    fwrite($archivo,"Hola buenos dias" . PHP_EOL);
    fwrite($archivo,"Mi nombre es Estrella" . PHP_EOL);
    fwrite($archivo,"Soy de Medina de las Torres" . PHP_EOL);

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