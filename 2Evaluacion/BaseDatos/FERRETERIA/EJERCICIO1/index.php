<?php
require_once __DIR__ . "/../BD.php";

// Si se pulsó el botón "Borrar" llega $_GET["del"] y $_GET["codigo"]
// isset() comprueba si la variable existe
if (isset($_GET["del"])) {
    Base::borrarProducto($_GET["codigo"]);
}

$arrayProductos = Base::getProductos(); //POR QUE SON METODOS ESTATICOS 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EJ1 - Ferreteria Borrar</title>
    <link rel="stylesheet" href="../miestilo.css">
</head>
<body>


<div id="barrasuperior">
    <h1><span class="subtitulo2">1.- FERRETERIA (Borrar) (El clavo)</span></h1>
</div>

<div id="contenedor">
    <table width="100%" border="1" align="center">
        <tr>
            <td class="primera_fila">CodigoArticulo</td>
            <td class="primera_fila">Seccion</td>
            <td class="primera_fila">NombreArticulo</td>
            <td class="primera_fila">Fecha</td>
            <td class="primera_fila">PaisdeOrigen</td>
            <td class="primera_fila">Precio</td>
            <td class="sin">&nbsp;</td>
        </tr>

        <?php foreach ($arrayProductos as $producto): ?>
        <tr>
            <td><?php echo htmlspecialchars($producto->getCodigoArticulo()); ?></td>
            <td><?php echo htmlspecialchars($producto->getSeccion()); ?></td>
            <td><?php echo htmlspecialchars($producto->getNombreArticulo()); ?></td>
            <td><?php echo htmlspecialchars($producto->getFecha()); ?></td>
            <td><?php echo htmlspecialchars($producto->getPaisdeOrigen()); ?></td>
            <td><?php echo htmlspecialchars($producto->getPrecio()); ?></td>
            <!--
                Cada fila tiene su propio mini-formulario GET.
                El input hidden manda el código del producto sin que el usuario lo vea.
                Al pulsar Borrar, la página se recarga y entra en el if de arriba.
            -->
            <td class="bot">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                    <input type="hidden" name="codigo" value="<?php echo $producto->getCodigoArticulo(); ?>">
                    <input type="submit" name="del" value="Borrar">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
