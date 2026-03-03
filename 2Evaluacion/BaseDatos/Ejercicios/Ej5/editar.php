<?php

// Carga la clase Base para obtener y actualizar un producto.
require_once __DIR__ . '/../BD.php';

$mensaje = '';
$producto = null;

// Guarda cambios cuando se envía el formulario.
if (isset($_POST['accion']) && $_POST['accion'] === 'actualizar') {
    $codigoArticulo = isset($_POST['CODIGOARTICULO']) ? trim($_POST['CODIGOARTICULO']) : '';
    $seccion = isset($_POST['SECCION']) ? trim($_POST['SECCION']) : '';
    $nombreArticulo = isset($_POST['NOMBREARTICULO']) ? trim($_POST['NOMBREARTICULO']) : '';
    $fecha = isset($_POST['FECHA']) ? trim($_POST['FECHA']) : '';
    $paisDeOrigen = isset($_POST['PAISDEORIGEN']) ? trim($_POST['PAISDEORIGEN']) : '';
    $precio = isset($_POST['PRECIO']) ? trim($_POST['PRECIO']) : '';

    // Si la fecha queda vacía, se guarda el valor por defecto solicitado en ejercicios previos.
    if ($fecha === '') {
        $fecha = '0000-00-00';
    }

    if ($codigoArticulo === '' || $seccion === '' || $nombreArticulo === '' || $paisDeOrigen === '' || $precio === '') {
        $mensaje = 'Debes completar los campos obligatorios.';
        $producto = Base::getUno($codigoArticulo);
    } else {
        $resultado = Base::actualizar($codigoArticulo, $seccion, $nombreArticulo, $fecha, $paisDeOrigen, $precio);

        if ($resultado === 1) {
            header('Location: index.php?mensaje=' . urlencode('Producto actualizado correctamente.'));
            exit;
        }

        $mensaje = 'No se pudo actualizar el producto.';
        $producto = Base::getUno($codigoArticulo);
    }
} else {
    // Carga el producto a editar usando el id recibido desde index.php.
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id !== '') {
        $producto = Base::getUno($id);
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej5 - Editar producto</title>
    <link rel="stylesheet" href="../miestilo.css">
</head>

<body>
    <div id="barrasuperior">
        <h1>Editar producto</h1>
        <span class="subtitulo2">Ejercicio5: edición del registro seleccionado</span>
    </div>

    <div id="contenedor">
        <?php if ($mensaje !== ''): ?>
            <p><?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>

        <?php if ($producto): ?>
            <?php $valorFecha = $producto->getFECHA() === '0000-00-00' ? '' : $producto->getFECHA(); ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="accion" value="actualizar">

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
                    <tr>
                        <!-- Código bloqueado para identificar siempre el registro correcto -->
                        <td><input type="text" name="CODIGOARTICULO" value="<?php echo htmlspecialchars($producto->getCODIGOARTICULO(), ENT_QUOTES, 'UTF-8'); ?>" readonly></td>
                        <td><input type="text" name="SECCION" maxlength="25" value="<?php echo htmlspecialchars($producto->getSECCION(), ENT_QUOTES, 'UTF-8'); ?>" required></td>
                        <td><input type="text" name="NOMBREARTICULO" maxlength="40" value="<?php echo htmlspecialchars($producto->getNOMBREARTICULO(), ENT_QUOTES, 'UTF-8'); ?>" required></td>
                        <td><input type="date" name="FECHA" value="<?php echo htmlspecialchars($valorFecha, ENT_QUOTES, 'UTF-8'); ?>"></td>
                        <td><input type="text" name="PAISDEORIGEN" maxlength="25" value="<?php echo htmlspecialchars($producto->getPAISDEORIGEN(), ENT_QUOTES, 'UTF-8'); ?>" required></td>
                        <td><input type="text" name="PRECIO" maxlength="8" value="<?php echo htmlspecialchars($producto->getPRECIO(), ENT_QUOTES, 'UTF-8'); ?>" required></td>
                        <td><input type="submit" value="Guardar"></td>
                    </tr>
                </table>
            </form>
        <?php else: ?>
            <p>No se encontró el producto seleccionado.</p>
        <?php endif; ?>

        <p style="margin-top: 15px;">
            <a href="index.php">Volver al listado</a>
        </p>
    </div>
</body>

</html>
