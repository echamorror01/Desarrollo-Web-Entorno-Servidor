<?php

// Procesa el borrado múltiple y devuelve el resultado al listado.
require_once __DIR__ . '/../BD.php';

// Mensaje por defecto si no llega ninguna selección.
$mensaje = 'No se seleccionó ningún producto para borrar.';

// Verifica que ids[] exista y tenga elementos antes de iterar.
if (isset($_POST['ids']) && is_array($_POST['ids']) && count($_POST['ids']) > 0) {

    $borradosCorrectos = 0;
    $errores = 0;

    // Borra uno a uno los productos seleccionados.
    foreach ($_POST['ids'] as $id) {
        $resultado = Base::borrar($id);

        if ($resultado === 1) {
            $borradosCorrectos++;
        } else {
            $errores++;
        }
    }

    // Construye un resumen final del proceso.
    if ($errores === 0) {
        $mensaje = 'Se borraron ' . $borradosCorrectos . ' producto(s) correctamente.';
    } else {
        $mensaje = 'Borrados correctos: ' . $borradosCorrectos . '. Errores: ' . $errores . '.';
    }
}

// Redirige para evitar el reenvío del formulario al refrescar.
header('Location: index.php?mensaje=' . urlencode($mensaje));
exit;
