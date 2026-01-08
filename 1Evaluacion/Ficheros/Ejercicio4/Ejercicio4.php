<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <form action="" method="get">
        <table class="bordes">
        <tr>
            <th colspan="2" class="centrado">Ver contenido de un archivo</th>
        </tr>
        <tr>
            <td><label for="archivo">Escribe el archivo</label></td>
            <td><input type="text" name="archivo"></td>
        </tr>
        <tr>
            <td colspan="2"  style="text-align:center;">
                <input type="submit" value="Enviar">
            </td> 
        </tr>
     </table>
    </form>
</body>
</html>
<?php

if(isset($_GET["archivo"])){
   $cadena= $_GET["archivo"];
   $cade=file($cadena);  //abre y lo lee y no hace falta cerrarlo 
   print_r($cade);
}else{
    echo"El fichero no existe";
}





?>