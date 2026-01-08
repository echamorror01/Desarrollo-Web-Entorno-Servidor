<?php
/* Una función (tipo procedimiento, no hay valor devuelto) denominada escribirAmpliar que reciba dos parámetros: un array de valores enteros y una cadena de texto que puede ser "sobreescribir" ó "ampliar". La función debe proceder a: escribir cada uno de los números que forman el contenido del array en una línea de un archivo "datosEscribirAmpliar.txt" usando el modo de operación que se indique con el otro parámetro. Si el archivo no existe, debe crearlo.
Ejemplo: El array que se pasa es $numeros = array(5, 9, 3, 22); 
y la invocación que se utiliza es escribirAmpliar
($numeros, "sobreescribir"); En este caso, se debe eliminar el contenido que existiera previamente en el archivo y escribir en él 4 líneas, cada una de las cuales contendrá los números 5, 9, 3 y 22.
*/

function escribirAmpliar($numeros,$valor){
/*Si $valor == "sobreescribir", entonces strcmp($valor, "sobreescribir") 
devolverá 0 y se ejecutará el bloque de código dentro 
del if.
Si $valor no es igual a "sobreescribir", 
la condición strcmp($valor, "sobreescribir") == 
0 no se cumple y el código dentro del if no se ejecutará. */
    if(strcmp($valor,"sobreescribir")==0){
        $archivo=fopen("datosEscribirAmpliar.txt","w+b");
        for($i=0;$i<count($numeros);$i++){
             //Escribir el archivo
            fwrite($archivo,$numeros[$i] . PHP_EOL);
        }
           
            fclose($archivo);
        
    }elseif(strcmp($valor,"ampliar")==0){
       $archivo=fopen("datosEscribirAmpliar.txt","a");
         for($i=0;$i<count($numeros);$i++){
             //Escribir el archivo
            fwrite($archivo,$numeros[$i] . PHP_EOL);
        }
       
        fclose($archivo);

    }else{
        echo"Error";
    }
        
}

escribirAmpliar(array(33,11,16),"sobreescribir");
escribirAmpliar(array(8,5,7),"ampliar");

?>