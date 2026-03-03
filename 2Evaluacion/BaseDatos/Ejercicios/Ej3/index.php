<?php

// Carga la clase Base para consultar y borrar productos.
require_once __DIR__ . '/../BD.php';

// Mensaje opcional devuelto tras el borrado múltiple.
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
    <title>Listado de productos - Ej3</title>
    <link rel="stylesheet" href="../miestilo.css">
</head>

<body>
    <div id="barrasuperior">
        <h1>Tabla productos</h1>
        <span class="subtitulo2">Ejercicio3: listado con selección múltiple y borrado masivo</span>
    </div>

    <div id="contenedor">
        <?php if ($mensaje !== ''): ?>
            <!-- Muestra el mensaje de estado de forma segura. -->
            <p><?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>

        <!-- Formulario único que envía los IDs marcados a borrar_multiple.php -->
        <form method="post" action="borrar_multiple.php">
            <table width="100%" border="1" align="center">
                <tr>
                    <td class="primera_fila">SELECCIONAR</td>
                    <td class="primera_fila">CODIGOARTICULO</td>
                    <td class="primera_fila">SECCION</td>
                    <td class="primera_fila">NOMBREARTICULO</td>
                    <td class="primera_fila">FECHA</td>
                    <td class="primera_fila">PAISDEORIGEN</td>
                    <td class="primera_fila">PRECIO</td>
                </tr>

                <?php foreach ($arrayDatos as $item): ?>
                    <tr>
                        <td>
                            <!-- ids[] permite enviar múltiples productos seleccionados -->
                            <input
                                type="checkbox"
                                name="ids[]"
                                value="<?php echo htmlspecialchars($item->getCODIGOARTICULO(), ENT_QUOTES, 'UTF-8'); ?>">
                        </td>

                        <!-- Salida escapada para evitar XSS -->
                        <td><?php echo htmlspecialchars($item->getCODIGOARTICULO(), ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($item->getSECCION(), ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($item->getNOMBREARTICULO(), ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($item->getFECHA(), ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($item->getPAISDEORIGEN(), ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($item->getPRECIO(), ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                <?php endforeach; ?>

                <tr>
                    <!-- Botón en la misma columna izquierda de selección -->
                    <td>
                        <input type="submit" value="Borrar seleccionados">
                    </td>
                    <td colspan="6"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
