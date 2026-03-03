<?php

// Carga la clase Base para consultar los productos.
require_once __DIR__ . '/../BD.php';

// Mensaje opcional recibido tras el borrado.
$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';

// Obtiene todos los productos para mostrarlos en la tabla.
$arrayDatos = Base::getTodos();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos - Ej2</title>
    <link rel="stylesheet" href="../miestilo.css">
</head>

<body>
    <div id="barrasuperior">
        <h1>Tabla productos</h1>
        <span class="subtitulo2">Ejercicio2: listado de productos con borrado encapsulado en archivo independiente</span>
    </div>

    <div id="contenedor">

        <?php if ($mensaje !== ''): ?>
            <!-- Muestra el mensaje escapado para evitar XSS -->
            <p><?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>

        <table width="100%" border="1" align="center">
            <tr>
                <td class="primera_fila">CODIGOARTICULO</td>
                <td class="primera_fila">SECCION</td>
                <td class="primera_fila">NOMBREARTICULO</td>
                <td class="primera_fila">FECHA</td>
                <td class="primera_fila">PAISDEORIGEN</td>
                <td class="primera_fila">PRECIO</td>
                <td class="primera_fila">ACCIÓN</td>
            </tr>

            <?php foreach ($arrayDatos as $item): ?>
                <tr>
                    <!-- Salida escapada para evitar XSS -->
                    <td><?php echo htmlspecialchars($item->getCODIGOARTICULO(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($item->getSECCION(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($item->getNOMBREARTICULO(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($item->getFECHA(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($item->getPAISDEORIGEN(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($item->getPRECIO(), ENT_QUOTES, 'UTF-8'); ?></td>

                    <td class="bot">
                        <!-- Envía el id al archivo que procesa el borrado -->
                        <form method="post" action="borrar.php">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($item->getCODIGOARTICULO(), ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="submit" value="Borrar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>
