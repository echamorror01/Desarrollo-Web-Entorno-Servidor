<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <div id= "contenedor"></div>
    <form action="Ejercicio4.php" method="post">
    <h3>Listado de autores  </h3>
    <label for="autor">Autor:</label>


    <?php

    include_once "../bd.php";
    $conexion=conectarPDO('localhost', 'biblioteca', 'root','');
    $resultado = consultar($conexion, "SELECT  NOMAUT FROM autor");

  // Mostrar el select dinámicamente

        mostrarSelectHTML($resultado, 'NOMAUT');

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $autor = $_POST['NOMAUT'] ?? '';

        if ($paisSeleccionado !== '') {
            // Obtener autores de ese país
            $autores = consultar($conexion, "SELECT NOMAUT FROM autor");

            if (count($autores) > 0) {
                echo '<h3>Autores de ' . htmlspecialchars($autor) . ':</h3>';
                echo '<ul>';
                foreach ($autores as $autor) {
                    echo '<li>' . htmlspecialchars($autor['NOMAUT']) . '</li>';
                }
                echo '</ul>';
            } else {
                echo 'No hay autores .';
            }
        } else {
            echo 'Seleccione un autor.';
        }
    }
?>


</body>
</html>