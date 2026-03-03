<?php

// Carga la clase Base para insertar y listar productos.
require_once __DIR__ . '/../BD.php';

$mensaje = '';

// Procesa el formulario de alta cuando llega por POST.
if (isset($_POST['accion']) && $_POST['accion'] === 'insertar') {

    $codigoArticulo = isset($_POST['CODIGOARTICULO']) ? trim($_POST['CODIGOARTICULO']) : '';
    $seccion = isset($_POST['SECCION']) ? trim($_POST['SECCION']) : '';
    $nombreArticulo = isset($_POST['NOMBREARTICULO']) ? trim($_POST['NOMBREARTICULO']) : '';
    $fecha = isset($_POST['FECHA']) ? trim($_POST['FECHA']) : '';
    $paisDeOrigen = isset($_POST['PAISDEORIGEN']) ? trim($_POST['PAISDEORIGEN']) : '';
    $precio = isset($_POST['PRECIO']) ? trim($_POST['PRECIO']) : '';

    // Si FECHA no se informa, se guarda el valor por defecto solicitado.
    if ($fecha === '') {
        $fecha = '0000-00-00';
    }

    // Valida que no haya campos vacíos antes de insertar.
    if ($codigoArticulo === '' || $seccion === '' || $nombreArticulo === '' || $paisDeOrigen === '' || $precio === '') {
        $mensaje = 'Debes completar todos los campos para insertar un producto.';
    } else {
        $resultado = Base::insertar($codigoArticulo, $seccion, $nombreArticulo, $fecha, $paisDeOrigen, $precio);

        if ($resultado > 0) {
            $mensaje = 'Producto insertado correctamente.';
        } else {
            $mensaje = 'No se pudo insertar. Revisa si el código ya existe.';
        }
    }
}

// Consulta principal para mostrar el listado.
$arrayDatos = Base::getTodos();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej4 - Listado e inserción de productos (fila superior)</title>
    <link rel="stylesheet" href="../miestilo.css">
</head>

<body>
    <div id="barrasuperior">
        <h1>Tabla productos</h1>
        <span class="subtitulo2">Ejercicio4: listado y alta con fila de inserción al inicio</span>
    </div>

    <div id="contenedor">

        <?php if ($mensaje !== ''): ?>
            <!-- Muestra el resultado de la operación de alta -->
            <p><?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>

        <!-- Formulario único: fila de alta primero y luego listado -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
            <input type="hidden" name="accion" value="insertar">

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
                    <td><input type="text" name="CODIGOARTICULO" maxlength="5" required></td>
                    <td><input type="text" name="SECCION" maxlength="25" required></td>
                    <td><input type="text" name="NOMBREARTICULO" maxlength="40" required></td>
                    <td><input type="date" name="FECHA"></td>
                    <td><input type="text" name="PAISDEORIGEN" maxlength="25" required></td>
                    <td><input type="text" name="PRECIO" maxlength="8" required></td>
                    <td><input type="submit" value="Añadir"></td>
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
                        <td></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </form>
    </div>
</body>

</html>
