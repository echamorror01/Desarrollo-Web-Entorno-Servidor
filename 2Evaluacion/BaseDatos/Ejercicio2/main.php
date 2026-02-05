
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <div id="contenedor"></div>
  



<?php
 /* incluir un botón de enviar dentro de un formulario, para que seleccionando un país de la select, enviemos el dato a un archivo php, que me muestre todos los autores de ese país, ordenado alfabéticamente por el nombre del autor.
Ejemplo para los autores de Canada: 
 */
include_once "conexion.php";


if(!isset($_POST["pais"])){
  echo "No se ha seleccionado ningun pais";
  exit;
}
 $pais= $_POST["pais"];
 echo "<h2> Autores de $pais </h2>";

 //Consulta sql

$sql= "SELECT NOMAUT,PAIS from autor where PAIS = '$pais' ORDER BY NOMAUT ASC";
$resultado= $conexion->query($sql);
  ?>
  <table>
    <tr>
        <th>Autor</th>
        <th>País</th>
    </tr>
    <?php
 while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
?>
  <table>
  <tr>
    <td><?php echo $fila['NOMAUT'] ; ?></td>
    <td><?php echo $fila['PAIS']; ?></td>
    </tr>

    <?php

 }
 $conexion=null;
    ?>
    </table>
</body>
</html>

