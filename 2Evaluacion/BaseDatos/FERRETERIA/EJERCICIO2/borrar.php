<?php
require_once __DIR__ . "/../BD.php";

// Recogemos el código que nos pasó index.php por la URL (?selcodigo=XXX)
$codigo = $_GET["selcodigo"];

// Borramos el producto
Base::borrarProducto($codigo);

// Redirigimos de vuelta al listado
// exit() es importante: detiene el script para que no ejecute nada más tras el header
header("Location: index.php");
exit();
?>
