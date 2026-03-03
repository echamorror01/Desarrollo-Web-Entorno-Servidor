<?php
require_once __DIR__ . "/../BD.php";

// --- BORRAR ---
// El botón Borrar usa un formulario POST con un input hidden que trae el código
if (isset($_POST["del"])) {
    Base::borrarProducto($_POST["codigo"]);
    header("Location: index.php");
    exit();
}

// --- INSERTAR ---
if (isset($_POST["ins"])) {
    $codigo  = $_POST["f_codigo"];
    $seccion = $_POST["f_seccion"];
    $nombre  = $_POST["f_nombre"];
    $fecha   = $_POST["f_fecha"];
    $pais    = $_POST["f_pais"];
    $precio  = $_POST["f_precio"];

    $afectados = Base::insertarProducto($codigo, $seccion, $nombre, $fecha, $pais, $precio);

    if ($afectados > 0) {
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('No se ha podido insertar: el código ya existe');</script>";
    }
}

$arrayProductos = Base::getProductos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EJ6 - CRUD Ferreteria</title>
    <link rel="stylesheet" href="../miestilo.css">
</head>
<body>

<div id="barrasuperior">
    <h1><span class="subtitulo2">6.- FERRETERIA CRUD (Completo) (El clavo)</span></h1>
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

            <!-- BORRAR: formulario POST con input hidden que trae el código -->
            <td class="bot">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="codigo" value="<?php echo $producto->getCodigoArticulo(); ?>">
                    <input type="submit" name="del" value="Borrar">
                </form>
            </td>

            <!-- EDITAR: enlace a editar.php pasando el código por GET -->
            <td class="bot">
                <a href="editar.php?selcodigo=<?php echo $producto->getCodigoArticulo(); ?>">
                    <input type="button" value="Editar">
                </a>
            </td>
        </tr>
        <?php endforeach; ?>

        <!-- INSERTAR: fila con inputs al final de la tabla -->
        <tr>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <td><input type="text" name="f_codigo"  size="10" class="centrado"></td>
                <td><input type="text" name="f_seccion" size="10" class="centrado"></td>
                <td><input type="text" name="f_nombre"  size="10" class="centrado"></td>
                <td><input type="date" name="f_fecha"   size="10" class="centrado"></td>
                <td><input type="text" name="f_pais"    size="10" class="centrado"></td>
                <td><input type="text" name="f_precio"  size="10" class="centrado"></td>
                <td class="bot"><input type="submit" name="ins" value="Insertar"></td>
            </form>
        </tr>
    </table>
</div>

</body>
</html>
