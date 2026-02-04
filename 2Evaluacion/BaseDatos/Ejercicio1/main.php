<?php
include "conexion.php";
/* Acceder a la tabla "autor" de la base de datos "biblioteca" y mostrar en pantalla los todos los autores y paìses que se encuentran en  dicha tabla "autor". 
Para mostrar los autores y sus países, utiliza una tabla html.*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id= "contenedor"></div>


<?php


$sql= "SELECT NOMAUT, PAIS FROM autor";
$resultado= $conexion->query($sql);

?>
<table>
<caption>Listado de autores y su pais  </caption>
<tr>
<th>Autores</th><th>Pais</th>
</tr>
<?php


 while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){

 
?>
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