<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="color">
    <form action="" method="get">
    <h2>Introducir contenido</h2>
   <label for="contenido">Introducir contenido</label><br>
   <input type="text" name="contenido" id="contenido" placeholder="Teclee el contenido"  ><br>
   <label for="contnual">Desea continuar¿(S/N)?</label><br>
    <input type="submit" name="accion" value="Si">
    <input type="submit" name="accion" value="No">
    </form>
     </div>



<?php
//Capturar los datos  
$contenido=isset($_GET["contenido"]) ? $_GET["contenido"] : " ";
$accion=isset($_GET["accion"]) ? $_GET["accion"] : " ";
//Si presiona si 
if(!empty($contenido) && $accion=="Si"){
 //si no está vacio 
 $archivo=fopen("datosEjercicio.txt","a"); //la a para agregar contenido
     if($archivo) {
    //Escribir el arhivo 
    fwrite($archivo,$contenido . PHP_EOL); // ES UN SALTO DE LINEA 
    //Cerramos el archivo
    fclose($archivo);
    //Mensaje de éxito 
    echo"Grabado";
     }else{
        echo"Error al abrir o al crear el archivo";
    }
}
//si marca que no 
if($accion=="No"){
    $archivo=fopen("datosEjercicio.txt","r");
    if($archivo){
        while(($linea=fgets($archivo))!==false){
           $lineas[]=$linea;
        }
        fclose($archivo);
         echo "<pre>";  // Para formatear mejor la salida
        print_r($lineas); // Mostrar el array
        echo "</pre>";
    }else{
        echo "Error";
    }
}

 

?>
</body>
</html>