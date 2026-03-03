<?php

// Procesa el borrado de un producto y redirige al listado con mensaje.

// Carga la clase Base.
require_once __DIR__ . '/../BD.php';

// Mensaje por defecto si no llega ningún id.
$mensaje = 'No se recibió ningún producto para borrar.';

// Acepta id recibido por POST o por GET.
if (isset($_POST['id']) || isset($_GET['id'])) {

    $id = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];

    // Ejecuta el borrado y construye el mensaje de resultado.
    $resultado = Base::borrar($id);

    if ($resultado === 1) {
        $mensaje = 'Producto borrado correctamente.';
    } else {
        $mensaje = 'No se pudo borrar el producto.';
    }
}

// Redirige para evitar reenvío del formulario al recargar.
header('Location: index.php?mensaje=' . urlencode($mensaje));
exit;
