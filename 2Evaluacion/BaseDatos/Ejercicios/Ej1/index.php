<?php

// Carga la clase Base para consultar y borrar productos.
require_once __DIR__ . '/../BD.php';

// Mensaje de estado para mostrar al usuario.
$mensaje = '';

// Procesa la acción de borrado si llega desde GET o POST.
if (isset($_GET['accion']) || isset($_POST['accion'])) {

    $accion = isset($_GET['accion']) ? $_GET['accion'] : $_POST['accion'];

    if ($accion === 'borrar' && isset($_GET['id'])) {

        $id = $_GET['id'];

        // Ejecuta el borrado y prepara el mensaje de resultado.
        $resultado = Base::borrar($id);

        if ($resultado === 1) {
            $mensaje = 'Producto borrado correctamente.';
        } else {
            $mensaje = 'No se pudo borrar el producto.';
        }
    }
}

// Consulta principal del listado.
$arrayDatos = Base::getTodos();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos</title>
    <link rel="stylesheet" href="../miestilo.css">
</head>

<body>
    <div id="barrasuperior">
        <h1>Tabla productos</h1>
        <span class="subtitulo2">      Ejercicio1: listado de productos con acción de borrado</span>
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
                        <!-- Envía la acción borrar con el id del registro -->
                        <form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="hidden" name="accion" value="borrar">
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
