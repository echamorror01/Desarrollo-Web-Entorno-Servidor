<?php
include_once("BD.php");
//Cojo el articulo de la tabla producto
$articulo=Base::get1Producto($_GET['frm_codigo']);
//Nombre corto para visualizar mas tarde
$nombreCorto=$articulo->getNombreCorto();
//tiendas donde se encuentra este articulo para vender
$array_de_tiendasArticulo=Base::getTiendas1Articulo($_GET['frm_codigo']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver tiendas</title>
</head>
<body>
    <div id="encabezado" style='text-align:center';>
       <h2 align=´center'> Ver tiendas  </h2>
       <hr>
    </div>
    <h3 style='text-align:center'> Tiendas donde puedes comprar el articulo :<span style="color:red"> <?php echo $nombreCorto; ?></span> </h3>
    <?php
    $totalUnidades=0;   
    echo "<table width='20%' border='1' align='center'><tr>";
    echo "<th>Tienda</th><th>Unidades</th></tr>";
    foreach ( $array_de_tiendasArticulo as $tienda){
        echo "<td>".$tienda->getTienda()."</td>";
        echo "<td>".$tienda->getUnidades()."</td>";
        $totalUnidades+=$tienda->getUnidades();
        echo "</tr>";
    }
    echo "<tr><th>TOTAL DE UNIDADES </th><th>$totalUnidades</th></tr>";
    echo "</table>";
    
echo "<a href='index.php'>Volver a la pagina anterior</a>";

?>


</body>
</html>