<?php
require_once __DIR__ . "/../BD.php";

// --- BORRAR ---
if (isset($_POST["del"])) {
    Base::borrarProducto($_POST["codigo"]);
    header("Location: index.php");
    exit();
}

// --- INSERTAR ---
if (isset($_POST["ins"])) {
    $afectados = Base::insertarProducto(
        $_POST["f_codigo"], $_POST["f_seccion"], $_POST["f_nombre"],
        $_POST["f_fecha"],  $_POST["f_pais"],    $_POST["f_precio"]
    );
    if ($afectados > 0) {
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('No se ha podido insertar: el código ya existe');</script>";
    }
}

// ----------------------------------------------------------------
// PAGINACIÓN
// El concepto es dividir todos los registros en "páginas" de N filas.
//
// Variables clave:
//   $tamanioPagina  → cuántos registros se muestran por página (ej: 5)
//   $pagina         → en qué página estamos ahora (llega por GET o vale 1)
//   $totalFilas     → total de registros en la BD (para calcular cuántas páginas hay)
//   $totalPaginas   → número total de páginas = ceil(total / tamaño)
//   $inicioDesdde   → a partir de qué fila pedir a la BD = (pagina-1) * tamaño
//
// Ejemplo con 12 registros y tamaño 5:
//   Página 1 → inicioDesdde=0,  pedimos filas 0-4
//   Página 2 → inicioDesdde=5,  pedimos filas 5-9
//   Página 3 → inicioDesdde=10, pedimos filas 10-11 (las que queden)
// ----------------------------------------------------------------

$tamanioPagina = 5;

// Recogemos la página actual de la URL (?pagina=2), por defecto es 1
if (isset($_GET["pagina"])) {
    $pagina = (int)$_GET["pagina"];
    if ($pagina < 1) $pagina = 1;
} else {
    $pagina = 1;
}

// Necesitamos el total de registros para calcular cuántas páginas hay
// count() sobre el array completo nos da ese número
$totalFilas   = count(Base::getProductos());
// ceil() redondea hacia arriba: 12/5 = 2.4 → 3 páginas
$totalPaginas = ceil($totalFilas / $tamanioPagina);

// Calculamos desde qué fila empezar para la página actual
$inicioDesdde = ($pagina - 1) * $tamanioPagina;

// Pedimos SOLO los registros de esta página usando LIMIT
$arrayProductos = Base::getProductosLimites($inicioDesdde, $tamanioPagina);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EJ7 - CRUD con Paginación</title>
    <link rel="stylesheet" href="../miestilo.css">
</head>
<body>

<div id="barrasuperior">
    <h1><span class="subtitulo2">7.- FERRETERIA (Paginación) (El clavo)</span></h1>
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
            <td class="bot">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="codigo" value="<?php echo $producto->getCodigoArticulo(); ?>">
                    <input type="submit" name="del" value="Borrar">
                </form>
            </td>
            <td class="bot">
                <a href="editar.php?selcodigo=<?php echo $producto->getCodigoArticulo(); ?>">
                    <input type="button" value="Editar">
                </a>
            </td>
        </tr>
        <?php endforeach; ?>

        <!-- Fila de inserción -->
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

    <!--
        LINKS DE PAGINACIÓN:
        Generamos un enlace por cada página con un bucle for.
        Al hacer clic en "2", la URL será index.php?pagina=2
        y $pagina valdrá 2 arriba en el PHP.
    -->
    <div class="paginacion">
        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
            <a href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</div>

</body>
</html>
