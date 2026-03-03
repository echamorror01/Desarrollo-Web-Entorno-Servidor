<?php
require_once __DIR__ . "/../BD.php";

$arrayProductos = Base::getProductos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EJ4 - Ferreteria Editar</title>
    <link rel="stylesheet" href="../miestilo.css">
</head>
<body>

<div id="barrasuperior">
    <h1><span class="subtitulo2">4.- FERRETERIA (Editar) (El clavo)</span></h1>
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
            <!-- Pasamos el código por GET a editar.php para que sepa qué producto cargar -->
            <td class="bot">
                <a href="editar.php?selcodigo=<?php echo $producto->getCodigoArticulo(); ?>">
                    <input type="button" value="Editar">
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
