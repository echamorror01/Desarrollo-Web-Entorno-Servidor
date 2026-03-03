<?php
require_once __DIR__ . "/../BD.php";

if (!isset($_POST["actualizar"])) {
    $producto = Base::get1Producto($_GET["selcodigo"]);
    $codigo  = $producto->getCodigoArticulo();
    $seccion = $producto->getSeccion();
    $nombre  = $producto->getNombreArticulo();
    $fecha   = $producto->getFecha();
    $pais    = $producto->getPaisdeOrigen();
    $precio  = $producto->getPrecio();
} else {
    $codigo  = $_POST["f_codigo"];
    $seccion = $_POST["f_seccion"];
    $nombre  = $_POST["f_nombre"];
    $fecha   = $_POST["f_fecha"];
    $pais    = $_POST["f_pais"];
    $precio  = $_POST["f_precio"];
    Base::actualizarProducto($codigo, $seccion, $nombre, $fecha, $pais, $precio);
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="../miestilo.css">
    <style>
        table td { border: 1px #000099 dotted; text-align: center; }
    </style>
</head>
<body>
<h1>Actualizar</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table width="25%" border="1" align="center" bordercolor="#FFFFCC">
        <tr>
            <td>Codigo</td>
            <td><input name="f_codigo" type="text" value="<?php echo htmlspecialchars($codigo); ?>" readonly></td>
        </tr>
        <tr>
            <td>Seccion</td>
            <td><input name="f_seccion" type="text" value="<?php echo htmlspecialchars($seccion); ?>"></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input name="f_nombre" type="text" value="<?php echo htmlspecialchars($nombre); ?>"></td>
        </tr>
        <tr>
            <td>Fecha</td>
            <td><input name="f_fecha" type="date" value="<?php echo htmlspecialchars($fecha); ?>"></td>
        </tr>
        <tr>
            <td>Pais</td>
            <td><input name="f_pais" type="text" value="<?php echo htmlspecialchars($pais); ?>"></td>
        </tr>
        <tr>
            <td>Precio</td>
            <td><input name="f_precio" type="text" value="<?php echo htmlspecialchars($precio); ?>"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="actualizar" value="Actualizar">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
