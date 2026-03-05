<?php
include_once("BD.php");

$array_de_borrados=Base::verBorrados();
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Borrados</title>
</head>
<body>
<div id="encabezado">
       <h2 style='text-align:center'> Productos que han sido borrados  </h2>
       <hr>
    </div>
<table width="40%" border="1" align="center">
<tr>
<th>Codigo</th><th>Tienda</th><th>Unidades</th>
</tr>
<?Php
foreach ($array_de_borrados as $borra){
    $objeto=Base::get1Tienda($borra->getTienda());
    echo "<tr>";
    echo "<td>". $borra->getProducto()." </td>";
    echo "<td>". $objeto->getNombre()." </td>";
    echo "<td>". $borra->getUnidades()." </td>";
    echo "</tr>";
}

?>

</table>
<a href='index.php'>Volver a la pagina anterior</a>
</body>
</html>