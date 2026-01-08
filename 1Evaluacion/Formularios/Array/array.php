<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
    <label for="numero">Introducir numeros enteros</label> <br>
    <input type="number" name="numeros[]"><br>
    <br>
    <input type="submit" value="Enviar">
    
 </form>
</body>
</html>
<?php
//Tienes que introducir 10 numeros  y luego imprimirlo en u array y el contenido y guardarlo en un formulario (bidimensional)

if(isset($_GET["numeros"])){
$numeros=$_GET["numeros"] ?? "";
 if (is_array($numeros)) {
        //convertimos el array en cadena , apuntado en la libreta 
        $numeros = implode(", ", $numeros);   //explode de cadena a array 
    }
//aqui lo escribe
$archivo= fopen("numeros.txt","a+b");
if($archivo){
    fwrite($archivo, $numeros . PHP_EOL);
    fclose($archivo);
}else{
    echo "Error";
}

//$array= file("numeros.txt");
//if(count($array)==10){
    //print_r($array);
//}
$archivo=fopen("numeros.txt","r+b");

if($archivo){
     while(($linea=fgets($archivo))!==false){
           $lineas[]=$linea;
           if(count($lineas)==10){
         echo "<pre>";  // Para formatear mejor la salida
        print_r($lineas); // Mostrar el array
        echo "</pre>";
           }
        }
        fclose($archivo);
        
    }else{
       echo "Error";
    }
}






?>