<?php

// Carga la clase Base para listar, insertar y borrar.
require_once __DIR__ . '/../BD.php';

$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';

// Procesa la acción de borrado por id.
if (isset($_GET['accion']) && $_GET['accion'] === 'borrar' && isset($_GET['id'])) {
    $resultadoBorrado = Base::borrar($_GET['id']);

    if ($resultadoBorrado === 1) {
        $mensaje = 'Producto borrado correctamente.';
    } else {
        $mensaje = 'No se pudo borrar el producto.';
    }
}

// Procesa la inserción de un nuevo producto.
if (isset($_POST['accion']) && $_POST['accion'] === 'insertar') {
    $codigoArticulo = isset($_POST['CODIGOARTICULO']) ? trim($_POST['CODIGOARTICULO']) : '';
    $seccion = isset($_POST['SECCION']) ? trim($_POST['SECCION']) : '';
    $nombreArticulo = isset($_POST['NOMBREARTICULO']) ? trim($_POST['NOMBREARTICULO']) : '';
    $fecha = isset($_POST['FECHA']) ? trim($_POST['FECHA']) : '';
    $paisDeOrigen = isset($_POST['PAISDEORIGEN']) ? trim($_POST['PAISDEORIGEN']) : '';
    $precio = isset($_POST['PRECIO']) ? trim($_POST['PRECIO']) : '';

    if ($fecha === '') {
        $fecha = '0000-00-00';
    }

    if ($codigoArticulo === '' || $seccion === '' || $nombreArticulo === '' || $paisDeOrigen === '' || $precio === '') {
        $mensaje = 'Debes completar los campos obligatorios para añadir.';
    } else {
        $resultadoInsercion = Base::insertar($codigoArticulo, $seccion, $nombreArticulo, $fecha, $paisDeOrigen, $precio);

        if ($resultadoInsercion > 0) {
            $mensaje = 'Producto añadido correctamente.';
        } else {
            $mensaje = 'No se pudo añadir. Comprueba si el código ya existe.';
        }
    }
}

// Obtiene el listado para mostrarlo en pantalla.
$arrayDatos = Base::getTodos();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej6 - Listado, alta, edición y borrado</title>
    <link rel="stylesheet" href="../miestilo.css">
</head>

<body>
    <div id="barrasuperior">
        <h1>Tabla productos</h1>
        <span class="subtitulo2">Ejercicio6: añadir, editar y borrar productos</span>
    </div>

    <div id="contenedor">
        <?php if ($mensaje !== ''): ?>
            <p><?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>

        <form id="formInsertar" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
            <input type="hidden" name="accion" value="insertar">
        </form>

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
                    <td><?php echo htmlspecialchars($item->getCODIGOARTICULO(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($item->getSECCION(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($item->getNOMBREARTICULO(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($item->getFECHA(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($item->getPAISDEORIGEN(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($item->getPRECIO(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="bot">
                        <form method="get" action="editar.php" style="display:inline-block; margin-right: 6px;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($item->getCODIGOARTICULO(), ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="submit" value="Editar">
                        </form>

                        <form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>" style="display:inline-block;">
                            <input type="hidden" name="accion" value="borrar">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($item->getCODIGOARTICULO(), ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="submit" value="Borrar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <td><input type="text" name="CODIGOARTICULO" maxlength="5" required form="formInsertar"></td>
                <td><input type="text" name="SECCION" maxlength="25" required form="formInsertar"></td>
                <td><input type="text" name="NOMBREARTICULO" maxlength="40" required form="formInsertar"></td>
                <td><input type="date" name="FECHA" form="formInsertar"></td>
                <td><input type="text" name="PAISDEORIGEN" maxlength="25" required form="formInsertar"></td>
                <td><input type="text" name="PRECIO" maxlength="8" required form="formInsertar"></td>
                <td><input type="submit" value="Añadir" form="formInsertar"></td>
            </tr>
        </table>
    </div>
</body>

</html>
