<?php
require_once __DIR__ . "/../BD.php";

// isset($_GET["del"]) → se pulsó el botón Borrar
// isset($_GET["como"]) → hay al menos un checkbox marcado
// Las dos condiciones juntas evitan errores si se pulsa Borrar sin marcar nada
if (isset($_GET["del"]) && isset($_GET["como"])) {
    // $_GET["como"] es un ARRAY porque los checkboxes se llaman como[]
    // Recorremos cada código marcado y lo borramos
    foreach ($_GET["como"] as $codigo) {
        Base::borrarProducto($codigo);
    }
}

$arrayProductos = Base::getProductos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EJ3 - Ferreteria Borrar Varios</title>
    <link rel="stylesheet" href="../miestilo.css">
</head>
<body>

<div id="barrasuperior">
    <h1><span class="subtitulo2">3.- FERRETERIA (Borrar Varios) (El clavo)</span></h1>
</div>

<div id="contenedor">
    <!--
        El formulario engloba TODA la tabla.
        Así el botón Borrar del encabezado envía todos los checkboxes marcados.
        method="get" para que llegue por $_GET
    -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <table width="100%" border="1" align="center">
            <tr>
                <td class="primera_fila">CodigoArticulo</td>
                <td class="primera_fila">Seccion</td>
                <td class="primera_fila">NombreArticulo</td>
                <td class="primera_fila">Fecha</td>
                <td class="primera_fila">PaisdeOrigen</td>
                <td class="primera_fila">Precio</td>
                <!-- El botón submit está en la cabecera -->
                <td class="bot"><input type="submit" name="del" value="Borrar"></td>
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
                    name="como[]" con corchetes → PHP lo recibe como array.
                    value = el código del producto de esa fila.
                    Si el usuario marca 3 checkboxes, $_GET["como"] tendrá 3 valores.
                -->
                <td class="bot">
                    <input type="checkbox" name="como[]" value="<?php echo $producto->getCodigoArticulo(); ?>">
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </form>
</div>

</body>
</html>
