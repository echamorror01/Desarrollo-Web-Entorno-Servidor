<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id= "contenedor"></div>
    <form action="main.php" method="post">
    <h3>Listado de autores de los autores </h3>
    <label for="pais">Pais:</label>

<?php

include_once "../bd.php";

$conexion=conectarPDO('localhost', 'biblioteca', 'root','');
$resultado = consultar($conexion, "SELECT DISTINCT PAIS FROM autor");

  // Mostrar el select dinámicamente

        mostrarSelectHTML($resultado, 'pais');

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $paisSeleccionado = $_POST['pais'] ?? '';

        if ($paisSeleccionado !== '') {
            // Obtener autores de ese país
            $autores = consultar($conexion, "SELECT NOMAUT FROM autor WHERE pais = '$paisSeleccionado'");

            if (count($autores) > 0) {
                echo '<h3>Autores de ' . htmlspecialchars($paisSeleccionado) . ':</h3>';
                echo '<ul>';
                foreach ($autores as $autor) {
                    echo '<li>' . htmlspecialchars($autor['NOMAUT']) . '</li>';
                }
                echo '</ul>';
            } else {
                echo 'No hay autores en ese país.';
            }
        } else {
            echo 'Seleccione un país.';
        }
    }
?>

    <br>
    <button value="submit">Seleccionar</button>
</form>
</body>
</html>