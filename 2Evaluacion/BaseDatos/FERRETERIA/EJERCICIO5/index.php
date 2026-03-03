<?php
require_once __DIR__ . "/../BD.php";

// Si se pulsó el botón "Insertar" del formulario
if (isset($_POST["ins"])) {
    $codigo  = $_POST["f_codigo"];
    $seccion = $_POST["f_seccion"];
    $nombre  = $_POST["f_nombre"];
    $fecha   = $_POST["f_fecha"];
    $pais    = $_POST["f_pais"];
    $precio  = $_POST["f_precio"];

    // insertarProducto devuelve 0 si el código ya existe (clave duplicada)
    $afectados = Base::insertarProducto($codigo, $seccion, $nombre, $fecha, $pais, $precio);

    if ($afectados > 0) {
        // Insertado correctamente: recargamos la página para ver el nuevo registro
        header("Location: index.php");
        exit();
    } else {
        // El código ya existía: mostramos alerta con JavaScript
        echo "<script>alert('No se ha podido insertar: el código ya existe');</script>";
    }
}

$arrayProductos = Base::getProductos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EJ5 - Ferreteria Insertar</title>
    <link rel="stylesheet" href="../miestilo.css">
</head>
<body>

<div id="barrasuperior">
    <h1><span class="subtitulo2">5.- FERRETERIA (Insertar) (El clavo)</span></h1>
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
        </tr>
        <?php endforeach; ?>

        <!--
            Fila extra al final de la tabla con inputs para insertar un nuevo registro.
            El formulario está dentro de la tabla y se envía a sí mismo (PHP_SELF).
        -->
        <tr>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <td><input type="text"  name="f_codigo"  size="10" class="centrado"></td>
                <td><input type="text"  name="f_seccion" size="10" class="centrado"></td>
                <td><input type="text"  name="f_nombre"  size="10" class="centrado"></td>
                <td><input type="date"  name="f_fecha"   size="10" class="centrado"></td>
                <td><input type="text"  name="f_pais"    size="10" class="centrado"></td>
                <td><input type="text"  name="f_precio"  size="10" class="centrado"></td>
                <td class="bot"><input type="submit" name="ins" value="Insertar"></td>
            </form>
        </tr>
    </table>
</div>

</body>
</html>
