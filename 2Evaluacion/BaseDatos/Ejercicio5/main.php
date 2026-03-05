<?php

/*  Acceder a la tabla "autor" de la base de datos 
"biblioteca" y mostrar en pantalla los distintos 
países que se encuentran en la tabla "autor". 
Para mostrar los países, debes utilizar un elemento 
de control de formulario "select" de htm*/

include_once "../bd.php";

$conexion = conectarPDO('localhost', 'biblioteca', 'root', '');
$resultado = consultar($conexion, "SELECT DISTINCT PAIS FROM autor");

// Guardar país seleccionado si se envió el formulario
$paisSeleccionado = $_POST['pais'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de autores</title>

        <style>
              table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: blue;
        }
        </style>
        </head>
<body>
    <div id="contenedor"></div>
    <form action="main.php" method="post">
        <h3>Listado de autores</h3>
        <label for="pais">País:</label>
        <select name="pais" id="pais">
            <option value="">-- Selecciona un país --</option>
            <?php
            foreach ($resultado as $fila) {
                $pais = $fila['PAIS'];
                // Mantener país seleccionado después de enviar
                $selected = ($pais === $paisSeleccionado) ? 'selected' : '';
                echo "<option value='" . htmlspecialchars($pais) . "' $selected>" . htmlspecialchars($pais) . "</option>";
            }
            ?>
        </select>
        <button type="submit">Seleccionar</button>
    </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $paisSeleccionado !== '') {
    // Obtener autores de ese país
    $autores = consultar($conexion, "SELECT NOMAUT FROM autor WHERE pais = '$paisSeleccionado'");

    if (count($autores) > 0) {
        echo '<h3>Autores de ' . htmlspecialchars($paisSeleccionado) . ':</h3>';
        echo '<table>';
        echo '<tr><th>Nombre</th><th>Enlace</th></tr>';
        foreach ($autores as $autor) {
            $nombre = htmlspecialchars($autor['NOMAUT']);
            echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td><a href='detalleAutor.php?id=$nombre'>$nombre</a></td>";
            echo "</tr>";
        }
        echo '</table>';
    } else {
        echo '<p>No hay autores en ese país.</p>';
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<p>Seleccione un país.</p>';
}
?>
</body>
</html>
















