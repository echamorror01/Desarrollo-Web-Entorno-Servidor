<?php
/* Realizar una  función (tipo procedimiento, no hay valor devuelto) denominada escribirTresNumeros que reciba tres números enteros como parámetros y proceda a escribir dichos números en tres líneas en un archivo denominado datosEjercicio.txt. Si el archivo no existe, debe crearlo. Una vez realizada la operación, debe aparecer el mensaje siguiente:
 Realizada la escritura con éxito*/

function escribir3numero($num1,$num2,$num3){
    $archivo=fopen("datosEjercicio.txt","w+b"); //la b es para cuando cambiamos de windows a linux
     if($archivo) {
    //Escribir el arhivo 
    fwrite($archivo,$num1 . PHP_EOL); // ES UN SALTO DE LINEA 
    fwrite($archivo,$num2 . PHP_EOL); 
    fwrite($archivo,$num3 . PHP_EOL);

    //Cerramos el archivo
    fclose($archivo);
    //Mensaje de éxito 
    echo"Realizada la escritura con éxito";
     }else{
        echo"Error al abrir o al crear el archivo";
    }

     }

// Recogemos los numeros enviados desde el formulario 
if(isset($_GET["numero1"],$_GET["numero2"],$_GET["numero3"])){
    $n1=$_GET["numero1"];
    $n2=$_GET["numero2"];
    $n3=$_GET["numero3"];
    
//llamamos a la funcion
escribir3numero($n1,$n2,$n3);
}else{
    echo"Rellena los 3 numeros";
}

?>